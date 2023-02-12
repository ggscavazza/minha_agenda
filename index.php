<?php
    date_default_timezone_set('America/Sao_Paulo');

    $dias = date('t');

    $meses      = array();
    $meses[1]   = "Janeiro";
    $meses[2]   = "Fevereiro";
    $meses[3]   = "Março";
    $meses[4]   = "Abril";
    $meses[5]   = "Maio";
    $meses[6]   = "Junho";
    $meses[7]   = "Julho";
    $meses[8]   = "Agosto";
    $meses[9]   = "Setembro";
    $meses[10]  = "Outubro";
    $meses[11]  = "Novembro";
    $meses[12]  = "Dezembro";

    $nomes_dias                 = array();
    $nomes_dias['Sunday']       = "Domingo";
    $nomes_dias['Monday']       = "Segunda-feira";
    $nomes_dias['Tuesday']      = "Terça-feira";
    $nomes_dias['Wednesday']    = "Quarta-feira";
    $nomes_dias['Thursday']     = "Quinta-feira";
    $nomes_dias['Friday']       = "Sexta-feira";
    $nomes_dias['Saturday']     = "Sábado";

    $mes_atual = date('n');
    $mes_format = date('m');
    $mes = $meses[$mes_atual];
    $ano = date('Y');
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Minha Agenda</title>

        <link href="style.css" reL="stylesheet" type="text/css">
    </head>

    <body>
        <div class="banner">
            <img src="logo_drCarlosCatharin_sf.png">
        </div>

        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        
        <div class="container">
            <div class="titulo">
                <h2>Agendamento <?php echo $mes; ?>/<?php echo $ano; ?></h2>
            </div>

            <div class="calendario">
                <?php for($i=1; $i <= $dias; $i++) { ?>
                    <?php 
                        if($i < 10){
                            $dia = '0'.$i;
                        }else{
                            $dia = $i;
                        }

                        $data_format = $ano.'-'.$mes_format.'-'.$dia;
                        $dia_semana = date('l', strtotime($data_format));
                    ?>
                    <div class="dia">
                        <h4 align="center">
                            <?php echo mb_strtoupper($nomes_dias[$dia_semana]); ?><br><br>
                            Dia <?php echo $dia; ?>
                        </h4>

                        <button>Agendar</button>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="contato">
            <a href="#" target="_blank">
                <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>