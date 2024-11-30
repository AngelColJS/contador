<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center mb-4">Contador</h1>
        <div class="flex justify-center items-center space-x-4">
            <button id="decrement" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">-</button>
            <div id="counter" class="text-4xl font-mono">{{ $counter }}</div>
            <button id="increment" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">+</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('increment').addEventListener('click', () => {
                fetch('/counter/increment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('counter').textContent = data.counter;
                });
            });

            document.getElementById('decrement').addEventListener('click', () => {
                fetch('/counter/decrement', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('counter').textContent = data.counter;
                });
            });
        });
    </script>
</body>
</html>
