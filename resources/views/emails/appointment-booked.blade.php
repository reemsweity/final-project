<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <p>Dear {{ $appointment->user->name }},</p>
    <p>Your appointment has been successfully booked. It is currently pending and will be confirmed soon.</p>
    <p>Once confirmed, a Zoom link and ID will be sent to you. Below are the details:</p>
    <p><strong>Zoom Link:</strong> {{ $zoomLink }}</p>
    <p><strong>Zoom ID:</strong> {{ $zoomId }}</p>
    <p>Thank you for choosing us!</p>
</body>
</html>
