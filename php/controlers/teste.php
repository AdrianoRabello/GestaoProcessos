<?php

try {
  $dir = new DirectoryIterator('../../documents');
  foreach ($dir as $item) {
      if ($item->isDot()) {
          continue;
      }
      echo "<table><tr>";

      echo "<td>".$item->getFilename()."</td>";
      date_default_timezone_set('America/Sao_Paulo');
      echo "<td>".date('d-m-y',$item->getCTime())."<td>";
      echo "</tr></table>";
  }

  } catch (UnexpectedValueException $e) {
  echo 'Erro: '.$e->getMessage();
}

 ?>
