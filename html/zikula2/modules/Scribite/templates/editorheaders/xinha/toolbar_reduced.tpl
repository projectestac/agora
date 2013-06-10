  xinha_config.toolbar =
    [
      ["popupeditor","htmlmode","separator","formatblock","bold","italic","underline","forecolor","textindicator","subscript","superscript"],
      ["separator","justifyleft","justifycenter","justifyright","justifyfull","separator","insertorderedlist","insertunorderedlist"],
      ["separator","inserthorizontalrule","createlink","insertimage"],
      ["separator","undo","selectall"], (HTMLArea.is_gecko ? [] : ["separator","cut","copy","paste"]),
      ["separator","killword","clearfonts","removeformat","toggleborders","showhelp","about"]
    ];