(function($){
    $(function(){
        $('body').on('grav-editor-ready', function() {
            var Instance = Grav.default.Forms.Fields.EditorField.Instance;
            Instance.addButton({
                adsense: {
                    identifier: 'adsense',
                    title: 'Adsense',
                    label: '<i class="fa fa-fw fa-adn"></i>',
                    modes: ['gfm', 'markdown'],
                    action: function(_ref) {
                        var codemirror = _ref.codemirror, button = _ref.button;
                        button.on('click.editor.adsense',function() {
                          var text = '[adsense id="" client="" slot="" width="" height="" type="inarticle/normal" class=""][/adsense]';

                          //Add text to the editor
                          var pos     = codemirror.getDoc().getCursor(true);
                          var posend  = codemirror.getDoc().getCursor(false);

                          for (var i=pos.line; i<(posend.line+1);i++) {
                            codemirror.replaceRange(text+codemirror.getLine(i), { line: i, ch: 0 }, { line: i, ch: codemirror.getLine(i).length });
                          }

                          codemirror.setCursor({ line: posend.line, ch: codemirror.getLine(posend.line).length });
                          codemirror.focus();
                        });
                    }
                }
            });
        });
    });
})(jQuery);
