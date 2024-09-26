<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .content h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .content p {
            line-height: 1.6;
            color: #555;
        }

        .footer {
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }

        .ticket-info {
            background-color: #f0f8ff;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .status {
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin: 15px 0;
            color: #fff;
            /* White text for contrast */
        }

        .status.pending {
            background-color: #6c757d;
            /* bg-secondary */
        }

        .status.open {
            background-color: #17a2b8;
            /* bg-info */
        }

        .status.in-progress {
            background-color: #ffc107;
            /* bg-warning */
            color: #333;
            /* Dark text for better readability */
        }

        .status.closed {
            background-color: #dc3545;
            /* bg-danger */
        }

        .status.done {
            background-color: #28a745;
            /* bg-success */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Ticket Notification</h1>
        </div>
        <div class="content">
            <h1>Hello {{ $user_name }},</h1>
            <div class="ticket-info">
                <p><strong>Subject:</strong> {{ $ticket->subject ?? 'No Subject' }}</p>
                <p><strong>Description:</strong> {{ $ticket->description ?? 'No Description' }}</p>
            </div>
            <div class="status {{ strtolower($status) }}">
                Status: <strong>{{ ucfirst($status) }}</strong>
            </div>
            <p>Thank you for using our application!</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Abdulla Al Anon. All rights reserved.
        </div>
    </div>
</body>

</html>
