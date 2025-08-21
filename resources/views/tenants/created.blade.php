<!DOCTYPE html>
<html>
<head>
    <title>Tenant Created</title>
</head>
<body>
    <h1>Tenant Created Successfully!</h1>
    <ul>
        <li><strong>Name:</strong> {{ $tenant->name }}</li>
        <li><strong>Domain:</strong> {{ $tenant->domain }}</li>
        <li><strong>Database:</strong> {{ $tenant->database }}</li>
    </ul>
    <p>Tenant migrations have been executed and tables are ready!</p>
</body>
</html>
