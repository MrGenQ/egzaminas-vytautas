<?php
use App\Models\User
?>
<nav class="navbar navbar-expand-lg navbar-light bg-black border-bottom">
    <div class="container-fluid" style="background-color: #000000; height: 60px">
        <div class="container" style="color: #ffffff; display: flex; flex-direction: row; justify-content: space-between">
            <div><h2>KITM</h2></div>
            <div style="display: flex; flex-direction: row; gap: 10px;">
                <a href="/" style="text-decoration: none; color: #ffffff;"><h3>Užklausos</h3></a>
                <a href="/add-task" style="text-decoration: none; color: #ffffff"><h3>Pridėti užklausa</h3></a>
                <div>
                    @if(Auth::check())
                        <div class="dropdown">
                            <a class="btn" style="background-color: #000000; color: #ffffff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <div style="font-size: 1.5rem; text-transform: capitalize">{{Auth::user()->name}}</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: #000000">
                                <li><a class="dropdown-item" style="color: #ffffff; background-color: #000000; font-size: 1.5rem" href="/logout">Atsijungti</a></li>
                            </ul>
                        </div>
                    @else
                        <a class="dropdown-item" href="/login" style="text-decoration: none; color: #ffffff; background-color: #000000; font-size: 1.5rem">Prisijungti</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
