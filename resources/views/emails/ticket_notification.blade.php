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
            padding: 5px;
            text-align: center;
        }

        .content {
            padding: 10px;
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
        }

        .status.pending {
            background-color: #6c757d;
        }

        .status.open {
            background-color: #17a2b8;
        }

        .status.in-progress {
            background-color: #ffc107;
            color: #333;
        }

        .status.closed {
            background-color: #dc3545;
        }

        .status.done {
            background-color: #28a745;
        }

        .review-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
            border-left: 4px solid #11ff00;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Ticket Notification</h2>
        </div>
        <div class="content">
            <h2>Hello {{ $user_name }},</h2>
            <div class="ticket-info">
                <p><strong>Subject:</strong> {{ $ticket->subject ?? 'No Subject' }}</p>
                <p><strong>Description:</strong> {{ $ticket->description ?? 'No Description' }}</p>
            </div>
            <div class="status {{ strtolower($status) }}">
                Status: <strong>{{ ucfirst($status) }}</strong>
            </div>

            @if (!empty($review))
                <div class="review-info">
                    <h3 style="margin-bottom: 10px;">Review</h3>
                    <p>{{ $review }}</p>
                </div>
            @endif

            <p>Thank you for using our application!</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Abdulla Al Anon. All rights reserved.
        </div>
    </div>
</body>

</html>
