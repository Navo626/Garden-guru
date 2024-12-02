<?php
class Security
{
    public static function SanitizeInput($input)
    {
        $input = trim($input);

        // Remove backslashes
        $input = stripslashes($input);

        // Remove HTML tags
        $input = strip_tags($input);

        // Convert special characters to HTML entities (prevent XSS)
        $input = htmlspecialchars($input);

        return $input;
    }

    public static function validate_password($password)
    {
        // Check if the password length is at least 6 characters
        if (strlen($password) < 6) {
            return false;
        }

        // Check if the password contains at least one number
        if (!preg_match('/\d/', $password)) {
            return false;
        }

        // Check if the password contains at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        // Check if the password contains at least one special character
        if (!preg_match('/[!@#$%^&*()_+{}\[\]:;<>,.?~\\\-]/', $password)) {
            return false;
        }

        // If all conditions are met, the password is valid
        return true;
    }
}
