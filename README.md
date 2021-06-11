# Documentation :

[graphql-php](https://webonyx.github.io/graphql-php/)

[Getting Started with Doctrine - Doctrine Object Relational Mapper (ORM)](https://www.doctrine-project.org/projects/doctrine-orm/en/2.8/tutorials/getting-started.html)

# Les outils pour GraphQL

Altair outil de test pour GraphQL:

https://altair.sirmuel.design/

Schéma Graphql :

https://apis.guru/graphql-voyager/

# GraphQL

## Mutation

```graphql
mutation{
  RegisterAccount(
    mail: "...",
    login: "...",
    password: "..."
  )
  {
    id,
    mail,
    ...
  }
}
```

## Query

### Utilisateur

```graphql
query{
  user(id: ... ){
    id
    mail
    login
  }
}
```

### Connection

```graphql
query{
  connect(
    mail: "...",
    password: "..."
  )
}
```