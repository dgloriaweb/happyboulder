<style>
    .nav-bar {
        display: flex;
        justify-content: center;
        gap: 1em;
        margin-bottom: 1.5em;
        flex-wrap: wrap;
    }
    .nav-bar a {
        background: #38bdf8;
        color: white;
        text-decoration: none;
        padding: 0.6em 1.2em;
        border-radius: 0.3em;
        font-weight: bold;
        transition: background 0.2s;
    }
    .nav-bar a.active, .nav-bar a:hover {
        background: #0ea5e9;
    }
    .nav-toggle {
        display: none;
        background: #38bdf8;
        border: none;
        color: white;
        font-size: 1.5em;
        padding: 0.5em;
        border-radius: 0.3em;
        position: absolute;
        top: 1em;
        right: 1em;
        z-index: 10;
    }
    @media (max-width: 500px) {
        .nav-bar {
            flex-direction: column;
            align-items: stretch;
            display: none;
            position: absolute;
            top: 3.5em;
            left: 0;
            width: 100%;
            background: #f1f5f9;
            padding: 1em 0;
        }
        .nav-bar.show {
            display: flex;
        }
        .nav-toggle {
            display: block;
        }
    }
</style>
<button class="nav-toggle" onclick="document.querySelector('.nav-bar').classList.toggle('show')">&#9776;</button>
<nav class="nav-bar">
    <a href="{{ url('/start') }}" class="{{ request()->is('start') ? 'active' : '' }}">Setup Route</a>
    <a href="{{ url('/qr_gen') }}" class="{{ request()->is('qr_gen') ? 'active' : '' }}">QR List</a>
    <a href="{{ url('/qr_read') }}" class="{{ request()->is('qr_read') ? 'active' : '' }}">Read QR</a>
</nav>