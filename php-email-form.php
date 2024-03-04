<?php

class PHP_Email_Form {
    
    const RECEIVER_EMAIL = 'jane.elixer143@gmail.com'; // Set the receiver's email address as a constant

    public $from_name;
    public $from_email;
    public $subject;
    public $message;

    public function __construct($from_name = "", $from_email = "") {
        // Set default values
        $this->from_name = $from_name;
        $this->from_email = $from_email;
        $this->subject = "New Contact Form Submission";
    }

    public function add_message($value, $label = '') {
        // Add a message to the email body
        $this->message .= $label . ": " . $value . "\n";
    }

    public function send() {
        // Prepare headers
        $headers = "From: {$this->from_name} <{$this->from_email}>" . "\r\n";
        $headers .= "Reply-To: {$this->from_email}" . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Send email
        return mail(self::RECEIVER_EMAIL, $this->subject, $this->message, $headers);
    }
}

?>
