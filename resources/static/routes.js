    var Ziggy = {
        namedRoutes: {"api.posts.index":{"uri":"api\/posts","methods":["GET","HEAD"],"domain":null},"api.posts.create":{"uri":"api\/posts\/create","methods":["GET","HEAD"],"domain":null},"api.posts.store":{"uri":"api\/posts","methods":["POST"],"domain":null},"api.posts.show":{"uri":"api\/posts\/{post}","methods":["GET","HEAD"],"domain":null},"api.posts.edit":{"uri":"api\/posts\/{post}\/edit","methods":["GET","HEAD"],"domain":null},"api.posts.update":{"uri":"api\/posts\/{post}","methods":["PUT","PATCH"],"domain":null},"api.posts.destroy":{"uri":"api\/posts\/{post}","methods":["DELETE"],"domain":null},"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"password\/email","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"password\/reset","methods":["POST"],"domain":null},"posts.index":{"uri":"posts","methods":["GET","HEAD"],"domain":null},"posts.create":{"uri":"posts\/create","methods":["GET","HEAD"],"domain":null},"posts.store":{"uri":"posts","methods":["POST"],"domain":null},"posts.show":{"uri":"posts\/{post}","methods":["GET","HEAD"],"domain":null},"posts.edit":{"uri":"posts\/{post}\/edit","methods":["GET","HEAD"],"domain":null},"posts.update":{"uri":"posts\/{post}","methods":["PUT","PATCH"],"domain":null},"posts.destroy":{"uri":"posts\/{post}\/destroy","methods":["GET","HEAD"],"domain":null},"home":{"uri":"\/","methods":["GET","HEAD"],"domain":null}},
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
