
    function ge(id) 
    { 
        return document.getElementById(id); 
    }
    
    function savesel(doc)
    {
        if(document.selection)
        {                
            doc.sel = document.selection.createRange().duplicate();
        }               
    }
    
    function click_url()
    {
        var url = prompt('Введите URL ссылки', 'http://');
        if(url)
            click_bb('text', 'url='+url, 'url')
    }
    
    function click_bb(aid, text1, text2) 
    {
        if(!text2)
            var text2 = '[/' + text1 + ']';
        else
            text2 = '[/' + text2 + ']';
     
        text1 =  '[' + text1 + ']';        
     
        if ((document.selection)) 
        { 
            ge(aid).focus(); 
            document.post.document.selection.createRange().text = 
            text1+document.post.document.selection.createRange().text + text2; 
        } else if(ge(aid).selectionStart != undefined) { 
            var element = document.getElementById(aid); 
            var str = element.value; 
            var start = element.selectionStart; 
            var length = element.selectionEnd - element.selectionStart; 
            element.value = str.substr(0, start) + text1 + str.substr(start, length) 
            + text2 + str.substr(start + length); 
     
        } else ge(aid).value += text1 + text2; 
    }
    
    function click_sm(aid,smile)
    {
        var text1 ='[' + smile + ']';      
     
        if ((document.selection)) 
        { 
            document.getElementById(aid).focus(); 
         
            document.post.document.selection.createRange().text = 
            document.post.document.selection.createRange().text + text1; 
        } else if(document.getElementById(aid).selectionStart != undefined) { 
            var element = ge(aid); 
            var str = element.value; 
            var start = element.selectionStart; 
            var length = element.selectionEnd - element.selectionStart; 
            element.value = str.substr(0, start) + str.substr(start, length) 
            + text1 + str.substr(start + length); 
        } else ge(aid).value += text1; 
        
        return false;
    }
    
    
    function change(id, img)
    { 
        ge(id).src = irb_bb_path + img + '.gif';
    } 












