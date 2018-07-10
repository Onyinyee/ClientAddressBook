<?php
//clean up form
$formEmail = $formPass = $name = $hashedPass = $loginError = $formData = $alertMessage = $clientName = $clientEmail = $clientPhone = $clientAddress = $clientCompany = $clientNotes =$clientName = $clientEmail = $clientPhone = $clientAddress = $clientCompany = $clientNotes = "";

function validateFormData($formData){

    $formData = trim( stripslashes( htmlspecialchars( strip_tags( str_replace( array( '(', ')', ), '', $formData ) ), ENT_QUOTES ) ) );
    return $formData;
}

?>