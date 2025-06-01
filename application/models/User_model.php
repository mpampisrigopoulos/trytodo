<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load the database library
        $this->load->database();
    }

    public function verify_login($email, $password) {
    // Assuming you have a table named 'users' with columns 'email' and 'password'
    $this->db->where('email', $email);
    $query = $this->db->get('users');

    if ($query->num_rows() == 1) {
        $user = $query->row();
        if (password_verify($password, $user->password)) {
            // Passwords match, return the user
            return $user;
        }
    }
    
    // No user found or passwords don't match
    return false;
}




   public function create_user($data) {
    // Insert user data into the 'users' table
    if ($this->db->insert('users', $data)) {
        return true; // Return true if insertion succeeds
    } else {
        // If insertion fails, you can log the error or handle it accordingly
        log_message('error', 'Error inserting user: ' . $this->db->error()['message']);
        return false; // Return false if insertion fails
    }
}


    public function update_user($user_id, $data) {
    // Assuming you have a 'users' table with a 'id' column to identify the user
    $this->db->where('id', $user_id); // Use appropriate column and value to identify the user
    return $this->db->update('users', $data);
}

   public function update_user_message($user_id, $message) {
    $this->db->where('id', $user_id);
    return $this->db->update('users', array('message' => $message));
}

public function get_user_messages($user_id, $column) {
    // Fetch the message for the specified user ID from the 'users' table
   $this->db->select($column);
    $this->db->where('id', $user_id);
    $query = $this->db->get('users');

    // Check if any message was found
    if ($query->num_rows() == 1) {
        // Return the fetched message content
        $row = $query->row();
        return $row->$column;

    } else {
        // Return null if no message was found or multiple messages were found (which should not happen)
        return null;
    }
}

public function verify_adminlogin($email, $password) {
    // Fetch user by email
    $this->db->where('email', $email);
    $query = $this->db->get('users');
    
    // Check if user exists
    if ($query->num_rows() == 1) {
        $user = $query->row();
        
        // Check if the user's id is 1 and the password is correct
        if ($user->id == 1 && $password == $user->password) {
            return $user;
        }
    }
    
    return false;
}

public function get_all_users_except_admin($admin_id) {
    // Fetch all users except the admin user from the database
    $this->db->where('id !=', $admin_id); // Exclude the admin user
    $query = $this->db->get('users');

    // Check if the query returned any results
    if ($query->num_rows() > 0) {
        // Return the array of user objects
        return $query->result();
    } else {
        // No users found, return an empty array
        return array();
    }
}


public function get_user_by_id($user_id) {
        // Query the database to retrieve the user with the specified ID
        $query = $this->db->get_where('users', array('id' => $user_id));

        // Check if the query returned any results
        if ($query->num_rows() > 0) {
            // Return the user data
            return $query->row();
        } else {
            // User not found, return null
            return null;
        }
    }




   public function update_user_as_admin($user_id, $data) {
    // Extract individual fields from the $data array
    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $email = $data['email'];
    $password = $data['password'];

    // If a new password is provided, update it
    if (!empty($password)) {
        $this->db->set('password', $password);
    }

    // Update the user's information in the database
    $this->db->set('first_name', $first_name);
    $this->db->set('last_name', $last_name);
    $this->db->set('email', $email);
    $this->db->where('id', $user_id);
    $this->db->update('users');
}



public function delete_user($user_id) {
    // Delete the user from the database
    $this->db->where('id', $user_id);
    $this->db->delete('users');

    // Check if the user was successfully deleted
    return $this->db->affected_rows() > 0;
}


public function get_all_messages($user_id) {
    // Query to retrieve all messages for the given user
    $this->db->select('message');
    $this->db->select('message2');
    $this->db->select('message3');
    $this->db->from('users');
    $this->db->where('id', $user_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        // Fetch all messages and return them
        return $query->result_array();
    } else {
        // Return an empty array if no messages are found
        return array();
    }
}

public function get_created_at($user_id) {
        $this->db->select('created_at');
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row->created_at;
        } else {
            return null;
        }
    }


public function get_user_by_email($email) {
    return $this->db->get_where('users', ['email' => $email])->row_array();
}

public function save_reset_token($email, $token, $expires) {
    $this->db->where('email', $email);
    return $this->db->update('users', [
        'reset_token' => $token,
        'reset_token_expires' => $expires
    ]);
}


public function get_user_by_token($token) {
    return $this->db->get_where('users', ['reset_token' => $token])->row_array();
}

public function update_password($email, $new_password) {
    return $this->db->where('email', $email)->update('users', [
        'password' => $new_password,
        'reset_token' => NULL,
        'reset_token_expires' => NULL
    ]);
}

public function clear_reset_token($email) {
    $this->db->where('email', $email);
    $this->db->update('users', [
        'reset_token' => NULL,
        'reset_token_expires' => NULL
    ]);
}

public function insert_next_message($user_id, $new_message) {
    $this->db->where('id', $user_id);
    $query = $this->db->get('users');
    $user = $query->row();

    if (!$user) {
        return false;
    }

    // Εύρεση του πρώτου διαθέσιμου message πεδίου
    if (empty($user->message)) {
        $this->db->set('message', $new_message);
    } elseif (empty($user->message2)) {
        $this->db->set('message2', $new_message);
    } elseif (empty($user->message3)) {
        $this->db->set('message3', $new_message);
    } else {
        // Όλα τα πεδία είναι γεμάτα
        return false;
    }

    $this->db->where('id', $user_id);
    return $this->db->update('users');
}



}
