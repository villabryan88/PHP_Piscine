SELECT count(*) AS 'nb_susc', floor(avg(price)) AS 'av_susc', sum(duration_sub) % 42 as ft FROM subscription;
