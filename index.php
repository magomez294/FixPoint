<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/menu.css">
    <link rel="stylesheet" href="./styles/index.css">
    <script src="./auth/logout.js"></script>
    <title>fixpoint</title>
</head>
<body>
<header>
        <img id="logo" src="./images/Logo.png" alt="">
        <img id="logoMenu" src="./images/menu.png" alt="" onclick="showHideMenu('menu')">
        <nav id="menu" class="hide">
            <img src="./images/hideMenu.png" alt="" id="hideMenu" onclick="showHideMenu('menu')">
            <ul>
                <?php if(!isset($_SESSION['loged'])){ ?>
                    <li><a href="">Iniciar Sesión</a></li>
                    <li><a href="">Crear Cuenta</a></li>
                <?php } ?>
                    <li> <a href="./pages/manuales/manualRegistrado.php">Manuales</a> </li>
                    <li><a href="./pages/herramientas/Herramientas.php">Herramientas</a></li>
                <?php if(isset($_SESSION['loged'])){ ?>
                    <li><button onclick="logOut()">Cerrar sesión</button></li>
                <?php } ?>
            </ul>
        </nav>
        <nav id="menuWeb2">
        <?php if(!isset($_SESSION['loged'])){ ?>
            <ul>
                <li><a href="./pages/createAccount.html">Crear Cuenta</a></li>
                <li><a href="./login.html">Iniciar Sesión</a></li>
            </ul>
        <?php } ?>
        <?php if(isset($_SESSION['loged'])){ ?>
            <ul>
                <li><button onclick="logOut()">Cerrar sesión</button></li>
            </ul>
        <?php } ?>
        </nav>
    </header>
    <nav id="menuWeb">
        <ul>
            <li> <a href="./pages/manuales/manualRegistrado.php">Manuales</a> </li>
            <li><a href="./pages/herramientas/Herramientas.php">Herramientas</a></li>
        </ul>
    </nav>
<main>
    <!--SLIDER-->
    <section id="slider">
            <!--IMAGEN-->
            <div id="imgSlider">
                <img src="./Images/slider.jpg" alt="">
            </div>
            <div id="txtSlider">
                <p>
                    ¡Volvemos a la carga con muchas ganas y con las debidas precauciones!
                    Date de alta como usuario y colabora con este proyecto. 
                </p>
            </div>
    </section>

    <!--CUERPO-->
    <section id="cuerpo">
        <!--TITULO-->
        <div id="titCuerpo">
            <p>FixPoint es una iniciativa circular sostenible.</p>
        </div>

        <!--SUBTITULO-->
        <div id="subtitCuerpo">
            <p>Actualmente disponible para alumnos y profesionales del C.I.F.P Pico Frentes de Soria .</p>
        </div>

         <!--CONTENDOR-->
        <div id="contenedor1">
            <p>¿Que es una Biblioteca de herramientas?</p>
            <p>FixPoint es la primera Biblioteca de préstamo de España. Las Bibliotecas de herramientas funcionan como cualquier otra Biblioteca. Te conviertes en miembro y luego puedes tomar prestadas herramientas. <br><br> No tenemos fines de lucro y buscamos ser una organización benéfica.</p>
        </div>
        <div id="contenedor2">
            <p>Se planea tener un taller comunitario abierto a los miembros (en un principio, alumnos del Pico Frentes), un espacio para trabajar en sus propios proyectos y aprender nuevas habilidades.
            El Taller dispondrá de herramientas y equipos fijos más grandes, disponibles para que los miembros lo usen. En el futuro, esperamos impartir clases de bricolaje, fabricación, construcción y uso seguro de herramientas.
            </p>
        </div>

        <!--IMAGEN CUERPO-->
        <div id="imgCuerpo">
            <img src="./Images/fotoIndex.jpg" alt="">
        </div>

        <!--CONOCENOS-->
        <div id="btnCon">
            <button onclick="openForm()" id="btnConocenos">Conocenos</button>
        </div>

        <section id="conocenos">
            <div id="formContenedor">
                <div id="btnCer">
                    <button id="btnCerrar" onclick="closeForm()"><img src="./Images/hideMenu.png" alt=""></button>
                </div>

                <!--MISION-->
                    <div id="mision">
                        <div id="titMision">
                            <p>Misión</p>
                        </div>
                        <p id="txtMision">Como una comunidad de ávidos manitas, deportistas al aire libre y personas con conciencia ambiental, la Biblioteca de herramientas FixPoint, quiere provocar un cambio en el sistema de sobreproducción e ineficiencia resultante, la contaminación ambiental y la desigualdad (social). La misión de FixPoint es transformar la mentalidad en la sociedad, en la que la propiedad se elige sobre el acceso. Queremos hacer esto inspirando a la población y organizaciones a abrir una Biblioteca FixPoint en su vecindario para que la gente tenga acceso a cosas que solo necesitan de vez en cuando,en lugar de posesión.</p>

                    </div>

                <!--VISION-->
                    <div id="vision">
                        <div id="titVision">
                            <p>Visión</p>
                        </div>
                        <p id="txtVision">FixPoint es un proyecto que lucha por una economía circular. Esto significa que creemos en un sistema cerrado de materias primas, en el que los productores seguirán siendo los propietarios de las materias primas contenidas en los productos en el futuro. Para lograr esto, sin embargo, debemos facilitar que 'acceder a' sea más fácil, más barato y más divertido que 'poseer'. </p>
                    </div>

                <!--OBJETIVOS-->
                <div id="objetivos">
                        <div id="titObjetivos">
                            <p>Los objetivos son simples:</p>
                        </div>
                        <ul id="txtObjetivos">
                            <li>Promover las habilidades de   bricolaje, fabricación y reparación mediante el intercambio de herramientas.</li>
                            <li>Hacer de Soria una ciudad más sostenible.</li>
                            <li>Crear oportunidades de aprendizaje y desarrollo.</li>
                        </ul>
                </div>
            </div>
        </section>
        <section id="conocenos2">
            <!--MISION-->
            <div id="mision2">
                        <div id="titMision2">
                            <p>Misión</p>
                        </div>
                        <p id="txtMision2">Como una comunidad de ávidos manitas, deportistas al aire libre y personas con conciencia ambiental, la Biblioteca de herramientas FixPoint, quiere provocar un cambio en el sistema de sobreproducción e ineficiencia resultante, la contaminación ambiental y la desigualdad (social). La misión de FixPoint es transformar la mentalidad en la sociedad, en la que la propiedad se elige sobre el acceso. Queremos hacer esto inspirando a la población y organizaciones a abrir una Biblioteca FixPoint en su vecindario para que la gente tenga acceso a cosas que solo necesitan de vez en cuando,en lugar de posesión.</p>

                    </div>

                <!--VISION-->
                    <div id="vision2">
                        <div id="titVision2">
                            <p>Visión</p>
                        </div>
                        <p id="txtVision2">FixPoint es un proyecto que lucha por una economía circular. Esto significa que creemos en un sistema cerrado de materias primas, en el que los productores seguirán siendo los propietarios de las materias primas contenidas en los productos en el futuro. Para lograr esto, sin embargo, debemos facilitar que 'acceder a' sea más fácil, más barato y más divertido que 'poseer'. </p>
                    </div>
        </section>
        <!--CONTACTO-->
        <div id="contContacto">
                
                <!--DIRECCION-->
                <div id="conDireccion">
                    <p>Dirección</p>
                    <p>
                    C.I.F.P Pico Frentes
                    Gervasio Manrique de Lara s/n
                    Soria, 42004
                    Spain 
                    </p>    

                </div>
                <!--TELEFONO-->
                <div id="conTelf">
                    <p>Contacto</p>
                    <p>975 23 94 43</p>
                </div>
                <!--HORARIOS-->
                <div id="conHorarios">
                    <p>Horario</p>
                    <p>
                        Lunes 10:00–15:00 <br>
                        Martes 10:00–14:05 <br>
                        Miércoles Closed <br>
                        Jueves 10:00–14:05 <br>
                        Viernes 10:00–14:05 <br>
                        Sábado Closed <br>
                        Domingo Closed <br>
                    </p>

                </div>

        </div>
        <div id="imgConocenos">
            <img src="./Images/fotoIndex.jpg" alt="">
        </div>

    </section>
    
</main>
<!--FOOTER-->
    <footer id="piePagina">
        <div id="datosLoc">
            <!--MAPA-->
            <div id="mapa">
                <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2975.8682280791513!2d-2.484362084729564!3d41.766498779231185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd44d2e709876957%3A0x469c9525026cc4ad!2sCentro%20Integrado%20De%20Formaci%C3%B3n%20Profesional%20Pic%C3%B3%20Frentes!5e0!3m2!1ses!2ses!4v1636360727061!5m2!1ses!2ses"  allowfullscreen="" loading="lazy"></iframe>
            </div>
            <!--DIRECCION-->
            <div id="direccion">
                <p>Dirección</p>
                <p>
                C.I.F.P Pico Frentes
                Gervasio Manrique de Lara s/n
                Soria, 42004
                Spain 
                </p> 
            </div>
            <!--TELEFONO-->
            <div id="telf">
                <p>Contacto</p>
                <p>975 23 94 43</p>
            </div>
            <!--HORARIOS-->
            <div id="horarios">
                <p>Horario</p>
                <p>
                    Lunes 10:00–15:00 <br>
                    Martes 10:00–14:05 <br>
                    Miércoles Closed <br>
                    Jueves 10:00–14:05 <br>
                    Viernes 10:00–14:05 <br>
                    Sábado Closed <br>
                    Domingo Closed <br>
                </p>
            </div>
        </div>

    </footer>




    
<script>
function openForm() {
  document.getElementById("conocenos").style.display = "block";
}
function closeForm() {
  document.getElementById("conocenos").style.display = "none";
}
</script>
</body>
</html>