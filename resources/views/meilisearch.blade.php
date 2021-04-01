<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div>
        <input type="text" id="search">
        <div id="results">

        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/meilisearch@latest/dist/bundles/meilisearch.umd.js'></script>
    <script>
        const client = new MeiliSearch({
            host: 'http://127.0.0.1:7700',
        })
        
        const index = client.index('users');

        const input = document.querySelector('#search')

        input.addEventListener('keyup', event => {

            let results = document.querySelector('#results');
            
            index.search(event.target.value).then(response => {

                // console.log(response.hits);
                let nodes = response.hits.map(user => {
                    let div = document.createElement('div');
                    div.textContent = user.name;
                    return div;
                })

                if(event.target.value.length === 0)
                {
                    results.innerHTML = "";
                }else{
                    results.innerHTML = "";
                    results.append(...nodes);
                }
            })
        })
    </script>
</body>
</html>