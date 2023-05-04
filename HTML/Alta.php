<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../JS/Alta/JSAlta.js"></script>
</head>

<?php
include("../PHP/Alta/CodigoAlta.php");
?>

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../IMG/MoustacheFondo.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<body>
    <!-- NAV BAR -->
    <header class="p-3 text-bg-dark sticky-top">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="paginaPrincipal.php" class="d-flex align-items-center mb-lg-0 text-white text-decoration-none">
                    <img src="../IMG/LogoSinFondo.png" width="75" height="50">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto col-md-4 me-3 ms-3 mb-2 justify-content-center mb-md-0">
                    <li><a href="paginaPrincipal.php" class="nav-link px-3 text-white subrayadoNav">Home</a></li>
                    <li><a href="Servicios.php" class="nav-link px-3 text-white subrayadoNav">Servicios</a></li>
                    <li><a <?php if (isset($_SESSION['Nombre'])) { ?> href="Reserva1.php" <?php } else { ?> href="Login.php" <?php } ?> class="nav-link px-3 text-white subrayadoNav">Reserva</a></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href='Login.php';">Iniciar sesión</button>
                    <button type="button" class="btn btn-warning" onclick="window.location.href='Alta.php';">Regístrate</button>
                </div>
            </div>
        </div>
    </header>

    <div class="col-md-6 offset-md-3 mt-5 mb-5">
        <!-- FORMULARIO ALTA -->
        <form method="POST" class="box">
            <div class="container-fluid w-75 p-5" style="background-color: #dec995; border-radius: 10px;">
                <div class="container-fluid text-center mb-4" style="margin-top: -2.5%;">
                    <h1>Crear cuenta</h1>
                </div>
                <h6>Nombre:</h6>
                <div class="mb-3" id="nameUsu">
                    <input type="text" class="form-control" placeholder="Nombre" name="nameUsuSignup" id="nameUsuSignup" onblur="comprobarEstadoInputs(1)" required>
                </div>
                <h6>Apellido/s:</h6>
                <div class="mb-3" id="surnameUsu">
                    <input type="text" class="form-control" placeholder="Apellido/s" name="surnameUsuSignup" id="surnameUsuSignup" onblur="comprobarEstadoInputs(2)" required>
                </div>
                <h6>Correo electrónico:</h6>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" id="pk" name="emailUsuSignup" id="emailUsuSignup" onblur="llamarServidor()">
                    <img id="imgComprobación" style="height: 2.75%; width: 2.75%;" hidden="true" />
                    <span id="textoComprobación" style="font-size: 12px;"></span>
                </div>
                <h6>Contraseña:</h6>
                <div class="mb-3" id="passUsu">
                    <input type="password" class="form-control" placeholder="Password" name="passUsuSignup" id="passUsuSignup" onblur="comprobarEstadoInputs(3)" required>
                </div>
                <h6>Confirmar contraseña:</h6>
                <div class="mb-3" id="pass2Usu">
                    <input type="password" class="form-control" placeholder="Confirmar password" name="pass2UsuSignup" id="pass2UsuSignup" onblur="comprobarEstadoInputs(4)" required>
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="terms" id="terms" onchange="estadoCheckbox()">
                    <span>Aceptar <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">términos y
                            condiciones</a></span>

                    <!-- Modal -->
                    <div class="modal fade staticBackdrop" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Términos y condiciones</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <b>Términos y condiciones</b><br>
                                    <br>
                                    <p>¡Bienvenido a Moustache!<br>
                                        <br>
                                        Estos términos y condiciones describen las reglas y regulaciones para el uso del
                                        sitio web de Moustache, ubicado en barberiamoustache.com.<br>
                                        <br>
                                        Al acceder a este sitio web, asumimos que aceptas estos términos y condiciones.
                                        No continúes usando Moustache si no estás de acuerdo con todos los términos y
                                        condiciones establecidos en esta página.<br>
                                        <br>
                                        <b>Cookies:</b><br>
                                        <br>
                                        El sitio web utiliza cookies para ayudar a personalizar tu experiencia en línea.
                                        Al acceder a Moustache, aceptaste utilizar las cookies necesarias.<br>
                                        <br>
                                        Una cookie es un archivo de texto que un servidor de páginas web coloca en tu
                                        disco duro. Las cookies no se pueden utilizar para ejecutar programas o enviar
                                        virus a tu computadora. Las cookies se te asignan de forma exclusiva y solo un
                                        servidor web en el dominio que emitió la cookie puede leerlas.<br>
                                        <br>
                                        Podemos utilizar cookies para recopilar, almacenar y rastrear información con
                                        fines estadísticos o de marketing para operar nuestro sitio web. Tienes la
                                        capacidad de aceptar o rechazar cookies opcionales. Hay algunas cookies
                                        obligatorias que son necesarias para el funcionamiento de nuestro sitio web.
                                        Estas cookies no requieren tu consentimiento ya que siempre funcionan. Ten en
                                        cuenta que al aceptar las cookies requeridas, también aceptas las cookies de
                                        terceros, que podrían usarse a través de servicios proporcionados por terceros
                                        si utilizas dichos servicios en nuestro sitio web, por ejemplo, una ventana de
                                        visualización de video proporcionada por terceros e integrada en nuestro sitio
                                        web.<br>
                                        <br>
                                        <b>Licencia:</b><br>
                                        <br>
                                        A menos que se indique lo contrario, Moustache y/o sus licenciantes poseen los
                                        derechos de propiedad intelectual de todo el material en Moustache. Todos los
                                        derechos de propiedad intelectual son reservados. Puedes acceder desde Moustache
                                        para tu uso personal sujeto a las restricciones establecidas en estos términos y
                                        condiciones.<br>
                                        <br>
                                        No debes:<br>
                                    <ul>
                                        <li type="disc">Copiar o volver a publicar material de Moustache</li>
                                        <li type="disc">Vender, alquilar o sublicenciar material de Moustache</li>
                                        <li type="disc">Reproducir, duplicar o copiar material de Moustache</li>
                                        <li type="disc">Redistribuir contenido de Moustache</li>
                                    </ul><br>
                                    Este acuerdo comenzará el fecha presente.<br>
                                    <br>
                                    Partes de este sitio web ofrecen a los usuarios la oportunidad de publicar e
                                    intercambiar opiniones e información en determinadas áreas. Moustache no filtra,
                                    edita, publica ni revisa los comentarios antes de su presencia en el sitio web.
                                    Los comentarios no reflejan los puntos de vista ni las opiniones de Moustache,
                                    sus agentes y/o afiliados. Los comentarios reflejan los puntos de vista y
                                    opiniones de la persona que publica. En la medida en que lo permitan las leyes
                                    aplicables, Moustache no será responsable de los comentarios ni de ninguna
                                    responsabilidad, daños o gastos causados ​​o sufridos como resultado de
                                    cualquier uso o publicación o apariencia de comentarios en este sitio web.<br>
                                    <br>
                                    Moustache se reserva el derecho de monitorear todos los comentarios y eliminar
                                    los que puedan considerarse inapropiados, ofensivos o que incumplan estos
                                    Términos y Condiciones.<br>
                                    <br>
                                    Garantizas y declaras que:<br>
                                    <br>
                                    <ul>
                                        <li type="disc">Tienes derecho a publicar comentarios en nuestro sitio web y
                                            tienes todas las
                                            licencias y consentimientos necesarios para hacerlo;</li>
                                        <li type="disc">Los comentarios no invaden ningún derecho de propiedad
                                            intelectual, incluidos,
                                            entre otros, los derechos de autor, patentes o marcas comerciales de
                                            terceros;</li>
                                        <li type="disc">Los comentarios no contienen ningún material difamatorio,
                                            calumnioso, ofensivo,
                                            indecente o ilegal de otro modo, que sea una invasión de la privacidad.</li>
                                        <li type="disc">Los comentarios no se utilizarán para solicitar o promover
                                            negocios o
                                            actividades comerciales personalizadas o presentes o actividades ilegales.
                                        </li>
                                    </ul><br>
                                    Por la presente, otorgas a Moustache una licencia no exclusiva para usar,
                                    reproducir, editar y autorizar a otros a usar, reproducir y editar cualquiera de
                                    tus comentarios en todas y cada una de las formas, formatos, o medios.<br>
                                    <br>
                                    <b>Hipervínculos a nuestro contenido:</b><br>
                                    <br>
                                    Las siguientes organizaciones pueden vincularse a nuestro sitio web sin
                                    aprobación previa por escrito:<br>
                                    <br>
                                    <ul>
                                        <li type="disc">Agencias gubernamentales;</li>
                                        <li type="disc">Motores de búsqueda;</li>
                                        <li type="disc">Organizaciones de noticias;</li>
                                        <li type="disc">Los distribuidores de directorios en línea pueden vincularse a
                                            nuestro sitio web
                                            de la misma manera que hacen hipervínculos a los sitios web de otras
                                            empresas
                                            que figuran en la lista; y</li>
                                        <li type="disc">Empresas acreditadas en todo el sistema, excepto que soliciten
                                            organizaciones
                                            sin fines de lucro, centros comerciales de caridad y grupos de recaudación
                                            de
                                            fondos de caridad que no pueden hacer hipervínculos a nuestro sitio web.
                                        </li>
                                    </ul><br>
                                    Estas organizaciones pueden enlazar a nuestra página de inicio, a publicaciones
                                    o a otra información del sitio siempre que el enlace: (a) no sea engañoso de
                                    ninguna manera; (b) no implique falsamente patrocinio, respaldo o aprobación de
                                    la parte vinculante y sus productos y/o servicios; y (c) encaja en el contexto
                                    del sitio de la parte vinculante.<br>
                                    </ul><br>
                                    Podemos considerar y aprobar otras solicitudes de enlaces de los siguientes
                                    tipos de organizaciones:<br>
                                    <br>
                                    <ul>
                                        <li type="disc">fuentes de información de consumidores y/o empresas comúnmente
                                            conocidas;</li>
                                        <li type="disc">sitios de la comunidad .com;</li>
                                        <li type="disc">asociaciones u otros grupos que representan organizaciones
                                            benéficas;</li>
                                        <li type="disc">distribuidores de directorios en línea;</li>
                                        <li type="disc">portales de Internet;</li>
                                        <li type="disc">firmas de contabilidad, derecho y consultoría; y</li>
                                        <li type="disc">instituciones educativas y asociaciones comerciales.</li>
                                    </ul><br>
                                    Aprobaremos las solicitudes de enlace de estas organizaciones si: (a) el enlace
                                    no nos haría vernos desfavorablemente a nosotros mismos ni a nuestras empresas
                                    acreditadas; (b) la organización no tiene registros negativos con nosotros; (c)
                                    el beneficio para nosotros de la visibilidad del hipervínculo compensa la
                                    ausencia de Moustache; y (d) el enlace está en el contexto de información
                                    general de recursos.<br>
                                    <br>
                                    Estas organizaciones pueden enlazar a nuestra página de inicio siempre que el
                                    enlace: (a) no sea engañoso de ninguna manera; (b) no implique falsamente
                                    patrocinio, respaldo o aprobación de la parte vinculante y sus productos o
                                    servicios; y (c) encaja en el contexto del sitio de la parte vinculante.<br>
                                    <br>
                                    Si eres una de las organizaciones enumeradas en el párrafo 2 y estás interesada
                                    en vincularte a nuestro sitio web, debes informarnos enviando un correo
                                    electrónico a Moustache. Incluye tu nombre, el nombre de tu organización, la
                                    información de contacto, así como la URL de tu sitio, una lista de las URL desde
                                    las que tienes la intención de vincular a nuestro sitio web y una lista de las
                                    URL de nuestro sitio a las que te gustaría acceder. Espera 2-3 semanas para
                                    recibir una respuesta.<br>
                                    <br>
                                    Las organizaciones aprobadas pueden hacer hipervínculos a nuestro sitio web de
                                    la siguiente manera:<br>
                                    <br>
                                    <ul>
                                        <li type="disc">Mediante el uso de nuestro nombre corporativo; o</li>
                                        <li type="disc">Mediante el uso del localizador uniforme de recursos al que se
                                            está vinculando;
                                            o</li>
                                        <li type="disc">Usar cualquier otra descripción de nuestro sitio web al que está
                                            vinculado que
                                            tenga sentido dentro del contexto y formato del contenido en el sitio de la
                                            parte vinculante.</li>
                                    </ul><br>
                                    No se permitirá el uso del logotipo de Moustache u otro material gráfico para
                                    vincular sin un acuerdo de licencia de marca comercial.<br>
                                    <br>
                                    <b>Responsabilidad del contenido:</b><br>
                                    <br>
                                    No seremos responsables de ningún contenido que aparezca en tu sitio web.
                                    Aceptas protegernos y defendernos contra todas las reclamaciones que se
                                    presenten en tu sitio web. Ningún enlace(s) debe aparecer en ningún sitio web
                                    que pueda interpretarse como difamatorio, obsceno o criminal, o que infrinja, de
                                    otra manera viole o defienda la infracción u otra violación de los derechos de
                                    terceros.<br>
                                    <br>
                                    <b>Reserva de derechos:</b><br>
                                    <br>
                                    Nos reservamos el derecho de solicitar que elimines todos los enlaces o
                                    cualquier enlace en particular a nuestro sitio web. Apruebas eliminar de
                                    inmediato todos los enlaces a nuestro sitio web cuando se solicite. También nos
                                    reservamos el derecho de modificar estos términos y condiciones y su política de
                                    enlaces en cualquier momento. Al vincular continuamente a nuestro sitio web,
                                    aceptas estar vinculado y seguir estos términos y condiciones de vinculación.<br>
                                    <br>
                                    <b>Eliminación de enlaces de nuestro sitio web:</b><br>
                                    <br>
                                    Si encuentras algún enlace en nuestro sitio que sea ofensivo por cualquier
                                    motivo, puedes contactarnos e informarnos en cualquier momento. Consideraremos
                                    las solicitudes para eliminar enlaces, pero no estamos obligados a hacerlo ni a
                                    responder directamente.<br>
                                    <br>
                                    No nos aseguramos de que la información de este sitio web sea correcta. No
                                    garantizamos su integridad o precisión, ni prometemos asegurarnos de que el
                                    sitio web permanezca disponible o que el material en el sitio se mantenga
                                    actualizado.<br>
                                    <br>
                                    <b>Exención de responsabilidad:</b><br>
                                    <br>
                                    En la medida máxima permitida por la ley aplicable, excluimos todas las
                                    representaciones, garantías y condiciones relacionadas con nuestro sitio web y
                                    el uso de este. Nada en este descargo de responsabilidad:<br>
                                    <br>
                                    <ul>
                                        <li type="disc">limitará o excluirá nuestra responsabilidad o la tuya por muerte
                                            o lesiones
                                            personales;</li>
                                        <li type="disc">limitará o excluirá nuestra responsabilidad o la tuya por fraude
                                            o
                                            tergiversación fraudulenta;</li>
                                        <li type="disc">limitará cualquiera de nuestras responsabilidades o las tuyas de
                                            cualquier
                                            manera que no esté permitida por la ley aplicable; o</li>
                                        <li type="disc">excluirá cualquiera de nuestras responsabilidades o las tuyas
                                            que no puedan
                                            estar excluidas según la ley aplicable.</li>
                                    </ul><br>
                                    Las limitaciones y prohibiciones de responsabilidad establecidas en esta sección
                                    y en otras partes de este descargo de responsabilidad: (a) están sujetas al
                                    párrafo anterior; y (b) regirá todas las responsabilidades que surjan en virtud
                                    de la exención de responsabilidad, incluidas las responsabilidades que surjan en
                                    el contrato, en agravio y por incumplimiento de la obligación legal.<br>
                                    <br>
                                    Siempre que el sitio web y la información y los servicios en el sitio se
                                    proporcionen de forma gratuita, no seremos responsables de ninguna pérdida o
                                    daño de cualquier naturaleza.<br>
                                    </p>
                                    <br>
                                    <b>Pagos a través de la web</b>
                                    <br>
                                    La compañía Moustache no se hace cargo de los datos recaudados a la hora de realizar
                                    los pagos a través de la compañía proveedora "PayPal". Toda acción consecuente no va
                                    a responabilizar a la barbería.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if ($passwrdFail) {
                    echo "<p id='mensajeError'>* Las contraseñas no coinciden.</p>";
                }
                ?>

                <div class="container-fluid text-center mt-4">
                    <input type="submit" class="btn btn-warning w-50" value="Registrarse" id="btnRegistrar" name="btnUsuSignup" disabled="true">
                </div>
            </div>
        </form>
    </div>

</body>

</html>