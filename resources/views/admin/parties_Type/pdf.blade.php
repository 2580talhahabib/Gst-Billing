<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin-bottom: 5px; }
        .header p { margin-top: 0; color: #666; }
        table { width: 100%; border-collapse: collapse; }
        table th { background-color: #f2f2f2; text-align: left; }
        table th, table td { padding: 8px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Generated on: {{ $date}}</p>
        <p>
            @foreach ($parties as $party)
                {{ $party->parties_name }}
            @endforeach
        </p>
    </div