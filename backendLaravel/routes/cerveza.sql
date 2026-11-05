SELECT
    c.name,
    p.name
FROM
    product as p
    INNER JOIN category as c ON c.id = p.category_id;