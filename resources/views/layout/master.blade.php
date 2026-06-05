<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg: #f8f7f4;
            --surface: #ffffff;
            --border: #e8e4dd;
            --border-strong: #d0cbc2;
            --text: #1a1814;
            --muted: #7a746a;
            --accent: #2d5a27;
            --accent-light: #edf5eb;
            --accent-text: #1e4019;
            --blue: #1e3a5f;
            --blue-light: #e8f0f8;
            --danger: #7a1f1f;
            --danger-light: #fdf0f0;
            --success: #1a4a2e;
            --success-light: #f0faf3;
            --shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.04);
        }

        body {
            font-family: 'DM Sans', "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 2rem;
        }

        .app-shell {
            max-width: 960px;
            margin: 0 auto;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 2rem;
            box-shadow: var(--shadow);
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: var(--text);
            margin: 0 0 0.5rem;
        }

        h2 {
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: -0.01em;
            color: var(--text);
            margin: 0;
        }

        .muted {
            font-size: 0.875rem;
            color: var(--muted);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
            gap: 1rem;
        }

        .section {
            margin-bottom: 2.5rem;
        }

        .field {
            margin-bottom: 1rem;
        }

        .field label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.4rem;
        }

        .field input {
            width: 100%;
            padding: 0.6rem 0.85rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.925rem;
            color: var(--text);
            background: var(--surface);
            transition: border-color 0.15s, box-shadow 0.15s;
            outline: none;
        }

        .field input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(45, 90, 39, 0.1);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            border: none;
            border-radius: 8px;
            padding: 0.55rem 1rem;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            transition: opacity 0.15s, transform 0.1s;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn:active {
            transform: scale(0.98);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border-strong);
        }

        .btn-secondary:hover {
            background: var(--bg);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 0.65rem 0.75rem;
            background: var(--bg);
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--muted);
            border-bottom: 1px solid var(--border);
        }

        td {
            text-align: left;
            padding: 0.75rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
            font-size: 0.9rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: var(--bg);
        }

        .actions a,
        .actions button {
            margin-right: 0.35rem;
            font-size: 0.82rem;
            color: var(--blue);
            background: var(--blue-light);
            border: none;
            border-radius: 6px;
            padding: 0.3rem 0.65rem;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: opacity 0.12s;
        }

        .actions a:hover,
        .actions button:hover {
            opacity: 0.8;
        }

        .alert {
            padding: 0.85rem 1.1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.88rem;
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            border-left: 3px solid;
        }

        .alert-error {
            background: var(--danger-light);
            color: var(--danger);
            border-color: var(--danger);
        }

        .alert-success {
            background: var(--success-light);
            color: var(--success);
            border-color: var(--success);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            background: var(--accent-light);
            color: var(--accent-text);
            padding: 0.2rem 0.55rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .photo {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 1rem;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .toolbar-actions {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="app-shell">
        @yield('content')
    </div>
</body>
</html>