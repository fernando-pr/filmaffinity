
drop table if exists peliculas cascade;

create table peliculas (
    id          bigserial    constraint pk_peliculas primary key,
    titulo      varchar(255) not null,
    sipnosis    text         not null
);


drop table if exists usuarios cascade;

create table usuarios (
    id         bigserial    constraint pk_usuarios primary key,
    nombre     varchar(15)  not null constraint uq_usuarios_nombre unique,
    password   varchar(60)  not null,
    email      varchar(255) not null,
    token      varchar(32)
);


drop table if exists etiquetas cascade;

create table etiquetas (
    id             bigserial    constraint pk_etiquetas primary key,
    nombre         varchar(60)  not null unique,
    pelicula_id    bigint       not null constraint fk_etiquetas_peliculas
    references peliculas (id)

);

drop table if exists etiquetadas cascade;

create table etiquetadas (
    pelicula_id    bigint       not null constraint fk_etiquetadas_peliculas
                                references peliculas (id)
                                on delete no action on update cascade,
    etiqueta_id    bigint       not null constraint fk_etiquetadas_etiquetas
                                references etiquetas (id)
                                on delete no action on update cascade,
    constraint pk_etiquetadas   primary key (pelicula_id, etiqueta_id)
);
