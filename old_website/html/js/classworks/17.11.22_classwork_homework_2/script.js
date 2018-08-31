     function search(texta) {
         var i = 0;
         var pos = content.indexOf(texta);
         while (pos != -1) {
             var root_d = document.getElementById("div0").childNodes[i];
             var el_n = document.createElement('a');
             el_n.setAttribute('href', 'http://google.com');
             el_n.setAttribute('style', 'background-color:gold;');
             rng = document.createRange();
             rng.setStart(root_d, pos);
             rng.setEnd(root_d, pos + texta.length);
             rng.surroundContents(el_n);
             i += 2;
             root_d = document.getElementById("div0").childNodes[i];
             content_new = root_d.textContent;
             pos = content_new.indexOf(texta);

         }
     }
