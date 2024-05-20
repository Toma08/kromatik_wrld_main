
    function validateForm() {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Felhasználónév ellenőrzése
        if (username.length < 3) {
            alert('A felhasználónév legalább 3 karakter hosszúnak kell lennie.');
            return false;
        }

        // Email ellenőrzése
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Kérlek, adj meg egy érvényes e-mail címet.');
            return false;
        }

        // Jelszó erősségének ellenőrzése (legalább 8 karakter hosszú, tartalmaz kis- és nagybetűket, valamint számot)
        if (password.length < 8 || !/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/\d/.test(password)) {
            alert('A jelszónak legalább 8 karakterből kell állnia, tartalmaznia kell kis- és nagybetűket, valamint számot.');
            return false;
        }

        return true;
    }

