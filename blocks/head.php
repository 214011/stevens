<?php
    require_once(__DIR__ . '/../lib/url.php');
    URL::$DIR = 'stevens';
    $root = new URL();
    $css = new URL('css');
    $js = new URL('js');
?>
<meta charset="UTF-8">
<link rel="icon" href="<?php echo $root->get_file('favicon.ico'); ?>">
<meta name="robots" content="none">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo $css->get_file('base.css'); ?>">
<script>
    (function(d) {
        var config = {
            kitId: 'scj6ipp',
            scriptTimeout: 3000,
            async: true
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo $css->get_file('style.css'); ?>">
<script src="<?php echo $js->get_file('main.js'); ?>"></script>