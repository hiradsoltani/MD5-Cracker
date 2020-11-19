<html>
<head>
  <title>Hirad Soltani MD5 Cracker</title>
</head>
<body>
  <h1>MD5 cracker</h1>
  <p>
    This application takes an MD5 hash of a four digit pin and check
    all 10,000 possible four digit PINs to determine the PIN.
  </p>

<pre>
Debug output:
<?php
$show = 15;
$total_checks = 0;
  if (isset($_GET['md5'])) {
    $time_pre = microtime(true);
    $pin = "Not Found";
    $num_set = "0123456789";
    for ($i = 0; $i <= 9; $i++) {
      for ($j = 0; $j <= 9; $j++) {
        for ($k = 0; $k <= 9; $k++) {
          for ($l = 0; $l <= 9; $l++) {
            $guess = $num_set[$i].$num_set[$j].$num_set[$k].$num_set[$l];
            $check = md5($guess);
            $total_checks++;
            if ($show !=0) {
              echo"$check $guess\n";
              $show = $show - 1;
            }
            if (md5($guess) == $_GET['md5']) {
              $pin = $guess;
              break;
            }
          }
        }
      }
    }
    $time_post = microtime(true);
    $elapsed_time = $time_post - $time_pre;
    echo "Total checks: $total_checks\n";
    echo "Elapsed time: $elapsed_time\n";
  }
 ?>
</pre>
<p>PIN: <?= htmlentities($pin); ?></p>
<form>
  <input type="text" name="md5" size="40">
  <input type="submit" value="Crack MD5">
</form>
</body>
</html>
