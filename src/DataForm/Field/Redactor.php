<?php namespace Zofe\Rapyd\DataForm\Field;

use Collective\Html\FormFacade as Form;
use Zofe\Rapyd\Rapyd;
class Redactor extends Field
{
  public $type = "text";

  public function build()
  {
    $output = "";
    if (parent::build() === false) return;

    switch ($this->status) {
      case "disabled":
      case "show":

        if ($this->type =='hidden' || $this->value == "") {
          $output = "";
        } elseif ( (!isset($this->value)) ) {
          $output = $this->layout['null_label'];
        } else {
          $output = nl2br(htmlspecialchars($this->value));
        }
        $output = "<div class='help-block'>".$output."&nbsp;</div>";
        break;

      case "create":
      case "modify":

        Rapyd::js('redactor/jquery.browser.min.js');
       // Rapyd::js('redactor/redactor.js');
       // Rapyd::css('redactor/css/redactor.css');
        Rapyd::js('tinymce/jquery.tinymce.min.js');
        Rapyd::js('tinymce/tinymce.js');
        $output  = Form::textarea($this->name, $this->value, $this->attributes);
        //Rapyd::script("$('[id=\"".$this->name."\"]').redactor();");
        //Rapyd::script("tinymce.init({ selector:'textarea#".$this->name."',
         Rapyd::script("$('textarea#".$this->name."').tinymce({  selector: 'textarea#full-featured-non-premium',
  plugins: 'print preview paste importcss searchreplace autolink directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-´',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,  
    external_filemanager_path:'".\URL::to('/')."/filemanager/',
   filemanager_title:'Responsive Filemanager' ,
   external_plugins: { 'filemanager' : '".\URL::to('/').'/'."filemanager/plugin.min.js'}

  // removes the menubar
      
         });");

        break;

      case "hidden":
        $output = Form::hidden($this->name, $this->value);
        break;

      default:;
    }
    $this->output = "\n".$output."\n". $this->extra_output."\n";
  }

}
