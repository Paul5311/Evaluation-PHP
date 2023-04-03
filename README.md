# Evaluation-PHP

use tp_blog;

create table commentary
(
    id         int  not null auto_increment primary key,
    commentary text not null,
    userId     int,
    articleId  int,
    foreign key (userId) references user (id),
    foreign key (articleId) references article (id)
);
