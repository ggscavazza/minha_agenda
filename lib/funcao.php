<?php
    function cria_dados_pagamento(){
        $dados_retorno = 
        {
            "referenceId": "teste1", //Identificador único do seu pedido criado por nós mesmos
            "callbackUrl": "https://minhaagenda.genesisdevstudio.com/callback.php", //Url para o qual o PicPay irá retornar a situação do pagamento
            "returnUrl": "https://minhaagenda.genesisdevstudio.com/cliente/pedido/teste1", //Url para a qual o cliente será redirecionado após o pagamento
            "value": 01.53, //Valor do pagamento em reais separando os centavos por ponto
            "expiresAt": "2023-02-20T21:00:00-03:00", //Quando a ordem de pagamento irá expirar. Formato ISO 8601
           //"channel": "my-channel",
            "purchaseMode": "online", //pode ser online ou in-store
            "buyer": {
              "firstName": "Gustavo",
              "lastName": "Scavazza",
              "document": "321.254.158-01",
              "email": "gustavo.diretoria@genesisdevstudio.com",
              "phone": "+55 11 97476-6138"
            },
            "notification": {
              "disablePush": true, //Desativar notificação no aplicativo do picpay
              "disableEmail": true //Desativar notificação via e-mail
            },
            "softDescriptor": "Plano básico contento apenas a solução de agenda online", //Descrição adicional que será enviada na identificação da transação para fatura do comprador
            "autoCapture": true
        };

        return $dados_retorno;
    }

    function requisicao_pagamento($dados_pagamento){
        $endpoint_picpay = "https://appws.picpay.com/ecommerce/public/payments";
        $x_picpay_token = "efebedb0-e00c-49f4-8613-2ba94d379daa";
        $x_seller_token = "24a3b6bd-9c8b-4a31-a096-85d2551a52fa";
        
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint_picpay,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $dados_pagamento,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-picpay-token: ".$x_picpay_token,
                "x-seller-token: ".$x_seller_token
            ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        if ($err) {
            $erro_req = "cURL Error #:" . $err;
            return $erro_req;
        } else {
            return $response;            
        }
    }
