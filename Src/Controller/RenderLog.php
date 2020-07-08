<?php
  $instance = new \CrudLog;
  $arr = $instance->read();

  echo "<table class='striped centered'><thead><tr><th>ID</th><th>Data</th><th>Valor em Estoque</th><th>Qtd de Produtos</th><th>Operação</th><th>ID do Produto</th></tr></thead><tbody>";
  foreach ($arr as $value) {
    $valor_max = round($value['valor_max'],2);
    $valor_max = explode(".",$valor_max);
    if(isset($valor_max[1]) and strlen($valor_max[0]) > 3){
        $valor_max[0] = str_split($valor_max[0], 3);
        $valor_max[0] = implode(".",$valor_max[0]);
    }
    $valor_max = implode(",",$valor_max);

    $id = $value['id'];
    $data = $value['data'];
    $qtd_produto = $value['qtd_produto'];
    $op = $value['operacao'];
    $prod_id = $value['prod_id'];
    echo "<tr><td>$id</td><td>$data</td><td>R$:$valor_max</td><td>$qtd_produto</td><td>$op</td><td>$prod_id</td></tr>";
  }

  echo "</tbody></table>";
