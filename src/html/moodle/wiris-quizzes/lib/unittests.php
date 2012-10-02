<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
      <table border="1">
        <tr>
          <td colspan="3">wrsqz_prepareVariablesInsideFormulas</td>
        <?php
        chdir('../..');
        require_once('config.php');
        require_once(dirname(__FILE__).'/functions.php');
        $tests = array(
          '<math xmlns="http://www.w3.org/1998/Math/MathML"><mi>p</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>=</mo><mi>#</mi><mi>p</mi></math>'=>'<math xmlns="http://www.w3.org/1998/Math/MathML"><mi>p</mi><mo>(</mo><mi>x</mi><mo>)</mo><mo>=</mo><mi>#p</mi></math>',
          '<math><mrow><mi>#</mi><mi>f</mi></mrow></math>'=>'<math><mrow><mi>#f</mi></mrow></math>',
          '<math><mrow><mi>#</mi><msup><mi>f</mi><mn>2</mn></msup></mrow></math>'=>'<math><mrow><msup><mi>#f</mi><mn>2</mn></msup></mrow></math>',
          '<math><mrow><msqrt><mrow><mn>2</mn><msqrt><mn>3</mn></msqrt></mrow></msqrt><mi>#</mi><mi>a</mi></mrow></math>'=>
          '<math><mrow><msqrt><mrow><mn>2</mn><msqrt><mn>3</mn></msqrt></mrow></msqrt><mi>#a</mi></mrow></math>',
          '<math><mrow><msub><mi>#</mi><mi>a</mi></msub></mrow></math>' => '<math><mrow><msub><mi>#</mi><mi>a</mi></msub></mrow></math>',
          '<math><mrow><mi>#</mi><msub><mi>a</mi><mi>c</mi></msub></mrow></math>'=>'<math><mrow><msub><mi>#a</mi><mi>c</mi></msub></mrow></math>',
          '<math><mrow><msqrt><mrow><mi>#</mi><mi>f</mi><mi>u</mi><mi>n</mi><mi>c</mi></mrow></msqrt></mrow></math>' => '<math><mrow><msqrt><mrow><mi>#func</mi></mrow></msqrt></mrow></math>',
          '<math xmlns="http://www.w3.org/1998/Math/MathML"><mo>&#8594;</mo><mn>0</mn></math>' => '<math xmlns="http://www.w3.org/1998/Math/MathML"><mo>&#8594;</mo><mn>0</mn></math>'
        );
        foreach($tests as $test=>$correct){
          $resp = wrsqz_prepareVariablesInsideFormulas($test, FALSE);
          echo '<tr><td>';
          echo $resp == $correct ? 'OK' : 'KO';
          echo '</td>';
          echo '<td>'.htmlentities($test, ENT_COMPAT, 'UTF-8').'</td>';
          echo '<td>'.htmlentities($resp, ENT_COMPAT, 'UTF-8').'</td>';
          echo '</tr>';
        }
        foreach($tests as $test=>$correct){
          $correct = wrsqz_mathmlEncode($correct);
          $test    = wrsqz_mathmlEncode($test);
          $resp    = wrsqz_prepareVariablesInsideFormulas($test, TRUE);
          echo '<tr><td>';
          echo $resp == $correct ? 'OK' : 'KO';
          echo '</td>';
          echo '<td>'.htmlentities($test, ENT_COMPAT, 'UTF-8').'</td>';
          echo '<td>'.htmlentities($resp, ENT_COMPAT, 'UTF-8').'</td>';
          echo '</tr>';
        }
        ?>
        </tr>
      </table>
    </body>
</html>
