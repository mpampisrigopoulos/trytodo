
# TryToDo – Web Εφαρμογή Διαχείρισης Μηνυμάτων Χρηστών

Το **TryToDo** είναι μια web εφαρμογή βασισμένη σε PHP & CodeIgniter 3, η οποία επιτρέπει σε χρήστες να δημιουργούν λογαριασμό, να αποστέλλουν μηνύματα και να διαχειρίζονται το ιστορικό τους. Περιλαμβάνει διαχειριστικό περιβάλλον (admin) και βασικούς μηχανισμούς ασφαλείας.

---

## 🔧 Τεχνολογίες που χρησιμοποιούνται

- PHP 7+
- CodeIgniter 3
- MySQL / MariaDB
- Bootstrap 5
- Font Awesome
- SMTP (Gmail) για αποστολή email
- Git / GitHub 

---

## 📂 Δομή Repository

```
trytodo/
├── application/               # CodeIgniter MVC structure                 
├── database.export/           # SQL export της βάσης δεδομένων
│   └── trytodo.sql
├── documentation/             # Τεχνική τεκμηρίωση
│   └── trytodo_doc.docx
├── system/                    # CodeIgniter core
├── .env                       # Περιβαλλοντικές μεταβλητές (excluded)
├── .gitignore
├── index.php
└── README.md                  # Περιγραφή του έργου
```

---

## 📌 Λειτουργίες

### Χρήστες
- Δημιουργία λογαριασμού
- Σύνδεση/Αποσύνδεση
- Προβολή και επεξεργασία προφίλ
- Αποστολή έως 3 μηνυμάτων
- Προβολή ιστορικού μηνυμάτων

### Διαχειριστής (Admin)
- Αυτόματος ορισμός: Χρήστης με `id = 1`
- Διαγραφή χρηστών
- Πρόσβαση σε διαχειριστικό dashboard

---

## 🔒 Ασφάλεια

- Κρυπτογράφηση κωδικών μέσω `password_hash`
- Χρήση CodeIgniter Active Record για αποφυγή SQL Injection
- Σύστημα επαναφοράς κωδικού με token
- Απόκρυψη ευαίσθητων δεδομένων μέσω `.env`

---

## 📦 Database

Το αρχείο `trytodo.sql` περιέχει το πλήρες schema και τα δεδομένα της βάσης.  
Το `users` table περιλαμβάνει email, κωδικό, μηνύματα, token επαναφοράς κ.ά.

---

## 🚀 Εκκίνηση τοπικά

1. Κάνε import το `trytodo.sql` στη MySQL μέσω HeidiSQL ή phpMyAdmin
2. Ρύθμισε τις μεταβλητές στο `.env`:
   ```
   SMTP_USER=your_email@gmail.com
   SMTP_PASS=your_smtp_app_password
   ```
3. Τρέξε το project μέσω XAMPP/Apache:  
   http://localhost/trytodo/

---

## 🧾 Τεκμηρίωση

Διαθέσιμη στον φάκελο `documentation/` ως αρχείο Word (`.docx`).

---

## 🧑‍💻 Συγγραφέας

**Mpampis Rigopoulos**  
GitHub: [@mpampisrigopoulos](https://github.com/mpampisrigopoulos)

---