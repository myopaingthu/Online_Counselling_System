<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Your Appointment Status</h1>
  <div>Your appointment with {{ $appointment->counsellor->name }} has been {{ AppointmentStatus::getLabel($appointment->status) }}.</div>
</body>

</html>