<form action="{{ url('/tenants') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Tenant Name" required>
    <input type="text" name="domain" placeholder="Tenant Domain" required>
    <button type="submit">Create Tenant</button>
</form>