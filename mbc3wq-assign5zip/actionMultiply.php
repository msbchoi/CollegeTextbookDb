Hello <?php echo htmlspecialchars($_POST['name']); ?>.

You typed the values  <?php echo (int)$_POST['value1']; ?> and 
<?php echo (int)$_POST['value2']; ?> .
Multiplied together, the value is <?php echo  ((int)$_POST['value2'])*((int)$_POST['value1']); ?> . 