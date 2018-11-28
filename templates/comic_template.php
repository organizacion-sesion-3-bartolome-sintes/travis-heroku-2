{ "collection" :
    {
        "title" : "Comic Database",
            "type" : "Comic",
            "version" : "1.0",
            "href" : "{{ path_for('comics')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/ComicIssue","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('comics') }}","prompt":"Comics"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('comics') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del tebeo"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del tebeo"},
                            {"name" : "writer", "value" : "{{ item.writer }}", "prompt" : "Guionista del tebeo"},
                            {"name" : "painter", "value" : "{{ item.painter }}", "prompt" : "Dibujante del tebeo"},
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de publicación"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre del tebeo"},
                {"name" : "description", "value" : "", "prompt" : "Descripción del tebeo"},
                {"name" : "writer", "value" : "", "prompt" : "Guionista del tebeo"},
                {"name" : "painter", "value" : "", "prompt" : "Dibujante del tebeo"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de publicación"}        
            ]
                }
    } 
}




