<!-- used for all except destintion creation -->

<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

<script>

   var options = {
   filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
   filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
   filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
   filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
 };

CKEDITOR.replace('description', options);
   CKEDITOR.config.height = 200;
   CKEDITOR.config.colorButton_colors = 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16';
   CKEDITOR.config.colorButton_enableMore = true;
   CKEDITOR.config.entities_processNumerical = 'force'; 
   CKEDITOR.config.floatpanel = true;
   CKEDITOR.config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,PageBreak,Styles,Format,Maximize,ShowBlocks,About';

</script>
