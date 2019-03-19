# Action Domain Responder

ADR - organizes a single user interface interaction between an HTTP client and a HTTP server-side application into three distinct roles.

![ADR](https://github.com/pmjones/adr/blob/master/adr.png)

## Components

_Action_ is the logic to connect the _Domain_ and _Responder_. It invokes the _Domain_ with inputs collected from the HTTP request, then invokes the _Responder_ with the data it needs to build an HTTP response.

_Domain_ is an entry point to the domain logic forming the core of the application, modifying state and persistence as needed. This may be a Transaction Script, Service Layer, Application Service, or something similar.

_Responder_ is the presentation logic to build an HTTP response from the data it receives from the _Action_. It deals with status codes, headers and cookies, content, formatting and transformation, templates and views, and so on.

## Collaborations

1. The web handler receives an HTTP request and dispatches it to an _Action_.

1. The _Action_ invokes the _Domain_, collecting any required inputs to the _Domain_ from the HTTP request.

1. The _Action_ then invokes the _Responder_ with the data it needs to build an HTTP response (typically the HTTP request and the _Domain_ results, if any).

1. The _Responder_ builds an HTTP response using the data fed to it by the _Action_.

1. The _Action_ returns the HTTP response to the web handler sends the HTTP response.

## Reading
 - https://github.com/pmjones/adr/blob/master/MENTIONS.md
 - https://herbertograca.com/2018/09/03/action-domain-responder/
 - http://pmjones.io/adr/
 - https://blog.bitexpert.de/blog/controller-classes-vs.-action-classes
 - https://jenssegers.com/85/goodbye-controllers-hello-request-handlers?utm_content=buffer0c6b3&utm_medium=social&utm_source=linkedin.com&utm_campaign=buffer
 - https://jenssegers.com/85/goodbye-controllers-hello-request-handlers
 
 ## Author
[Dykyi Roman](https://www.linkedin.com/in/roman-dykyi-43428543/), e-mail: [mr.dukuy@gmail.com](mailto:mr.dukuy@gmail.com)
 
