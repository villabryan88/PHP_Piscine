INSERT INTO ft_table(login,creation_date, `group`)
Select last_name,birthdate,'other' 
	from user_card 
	WHERE last_name 
		LIKE "%a%"
		AND char_length(last_name) < 9
	ORDER BY last_name asc
	LIMIT 10;
