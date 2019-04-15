    var Ziggy = {
        namedRoutes: {"api.posts.index":{"uri":"api\/posts","methods":["GET","HEAD"],"domain":null},"api.posts.create":{"uri":"api\/posts\/create","methods":["GET","HEAD"],"domain":null},"api.posts.store":{"uri":"api\/posts","methods":["POST"],"domain":null},"api.posts.show":{"uri":"api\/posts\/{post}","methods":["GET","HEAD"],"domain":null},"api.posts.edit":{"uri":"api\/posts\/{post}\/edit","methods":["GET","HEAD"],"domain":null},"api.posts.update":{"uri":"api\/posts\/{post}","methods":["PUT","PATCH"],"domain":null},"api.posts.destroy":{"uri":"api\/posts\/{post}","methods":["DELETE"],"domain":null}},
        baseUrl: 'http://blog.local/',
        baseProtocol: 'http',
        baseDomain: 'blog.local',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
