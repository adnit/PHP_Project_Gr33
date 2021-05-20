<?php
class SendEmail{

  private $header = "";
  private $email = "";
  private $website = 'localhost';

  function __construct($email) {
		$this->email = $email;
    $this->header = 'From:kinofiek@gmail.com' . "\r\n";
    $this->header .= "MIME-Version: 1.0\r\n";
    $this->header .= "Content-Type: text/html; charset=utf-8\r\n";
	}
  function sendContact($firstname){
    $subject = 'Faleminderit qe kontaktuat KinoFiek';
    $message =
    '<html><body>
    <h3>Pershendetje ' . $firstname . ",</h3>". '<p>Ne kemi pranuar mesazhin tuaj dhe me ane te kesaj emaile ju informojme qe do te pergjigjjemi ne kerkesen tuaj ne kohen me te shpejte te mundur.</p>
    <p>Faleminderit qe gjetet kohen per te na kontaktuar.</p>
    <h3>Kjo eshte nje email e automatizuar, ju lutemi mos beni reply.</h3></body></html>';
    ;
    return mail($this->email, $subject, $message, $this->header);
  }
  function sendVerify($username, $hash){
    $border = str_repeat('=', strlen($this->email));
    $subject = 'Emaili per verifikim | KinoFiek';
    $message =
        '
          <html>
          <body>
          <img style="width:100%; height:200px; object-fit:contain" src = "https://kinofiek.online/images/KinoFiekMetaData.png"> <hr>
          <h3>Pershendetje <strong>' . $username . '</strong>, faleminderit qe u regjistruat ne KinoFIEK! </h3>
          <h4>Llogaria juaj eshte krijuar, per te perdorur te gjitha sherbimet e kinemase tone ju duhet
          verifikoni accountin tuaj duke klikuar linkun me poshte.</h4>
          </h4>
          Keto jane te dhenat tuaja: <br> 
          '.$border.' <br> 
          email:   ' . $this->email . ' <br>
          username:' . $username . ' <br> 
          '.$border.' <br>
          </h4>
          <h3> Kliko <strong><a href = "' . $this->website . '/verify.php?email=' . $this->email . '&hash=' . $hash . '">ketu</a></strong>. </h3>
          <hr>
          Nese linku me larte nuk funksionon kopjoni kete link ne browserin tuaj: <a href="' . $this->website . '/verify.php?email=' . $this->email . '&hash=' . $hash . '">' . $this->website . '/verify.php?email=' . $this->email . '&hash=' . $hash . '</a>
          <h3>Kjo eshte nje email e automatizuar, ju lutemi mos beni reply.</h3>
          </body>
          </html>
          ';
      return mail($this->email, $subject, $message, $this->header);
}
  function sendReset($username, $hash){
    $subject = 'Emaili per verifikim | KinoFiek';
    $message =
      '         <html>
                <body>
                <img style="width:100%; height:200px; object-fit:contain" src = "https://kinofiek.online/images/KinoFiekMetaData.png"> <hr>
                <h3>Pershendetje <strong>' . $username . '</strong>,</h3>
                <h4>Keni kerkuar qe te resetoni fjalekalimin e llogarise tuaj, klikoni linkun me poshte per te resetuar fjalekalimin tuaj</h4>
                <h3> Kliko <strong><a href = "localhost/verify.php?username='. $username . '&hash=' . $hash . '">ketu</a></strong>. </h3>
                <hr>
                Nese linku me larte nuk funksionon kopjoni kete link ne browserin tuaj: <a href="' . $this->website . '/reset.php?username='. $username . '&hash=' . $hash . '">' . $this->website . '/reset.php?username='. $username . '&hash=' . $hash . '</a>
                <h3>Kjo eshte nje email e automatizuar, ju lutemi mos beni reply.</h3>
                </body>
                </html>
      ';
      return mail($this->email, $subject, $message, $this->header);
}
}
?>