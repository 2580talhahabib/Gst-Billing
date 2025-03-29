<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .detail-card {
            max-width: 600px;
            margin: 2rem auto;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
        .detail-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .detail-icon {
            font-size: 1.5rem;
            margin-right: 0.5rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card detail-card">
            <div class="card-header detail-header">
                <h4 class="mb-0">
                    <i class="fas fa-user-friends detail-icon"></i>
                    Party Details
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Party ID:</div>
                    <div class="col-sm-8">{{ $party->id }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Name:</div>
                    <div class="col-sm-8">{{ $party->parties_name }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Created At:</div>
                    <div class="col-sm-8">{{ $party->created_at->format('M d, Y h:i A') }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Last Updated:</div>
                    <div class="col-sm-8">{{ $party->updated_at->format('M d, Y h:i A') }}</div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('parties_type') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
                <a href="{{ route('parties_type.singlepdf', $party->id) }}" class="btn btn-primary">
                    <i class="fas fa-file-pdf me-1"></i> Generate PDF
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>