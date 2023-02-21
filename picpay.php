<?php
    require_once("lib/funcao.php");

    $dados_pagamento = cria_dados_pagamento();

    $requisitando_pagamento = requisicao_pagamento($dados_pagamento);
      