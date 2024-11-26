PROCEDURES ---------------------------
DELIMITER //

CREATE PROCEDURE piMoto (
	IN _modelo					VARCHAR(100),
    IN _ano_modelo				year,
    IN _ano_fabricacao			year,
    IN _cor_primaria			VARCHAR(100),
    IN _cor_secundaria			VARCHAR(100),
    IN _valor					decimal(10,2)
)
BEGIN
	INSERT INTO moto(modelo, ano_modelo, ano_fabricacao , cor_primaria, cor_secundaria, valor)
    VALUES (_modelo, _ano_modelo, _ano_fabricacao , _cor_primaria, _cor_secundaria,_valor );
END //

DELIMITER //

CREATE PROCEDURE piServicos (
	IN _pneus				VARCHAR(100),
    IN _freios				VARCHAR(150),
    IN _oleo_motor			VARCHAR(300),
    IN _corrente			VARCHAR(300),
    IN _bateria				VARCHAR(300),
    IN _filtros				varchar(300),
    IN _valor				decimal(10,2)
)
BEGIN
	INSERT INTO servicos(pneus, freios, oleo_motor, corrente , bateria, filtros, valor )
    VALUES (_pneus, _freios, _oleo_motor, _corrente , _bateria, _filtros,_valor );
END //

DELIMITER //

CREATE PROCEDURE psMoto (
IN _id		INT
)

BEGIN
SELECT * FROM moto
WHERE id_moto = _id;

END //

DELIMITER //

CREATE PROCEDURE psServicos (
IN _id		INT
)

BEGIN
SELECT * FROM moto
WHERE id_servicos = _id;

END //


DELIMITER //
CREATE PROCEDURE psListarMoto()
BEGIN
    SELECT id_moto, modelo, ano_modelo, ano_fabricacao, cor_primaria, cor_secundaria, valor
    FROM moto;
END //


DELIMITER //
CREATE PROCEDURE psListarServicos()
BEGIN
    SELECT id_servicos, pneus, freios, oleo_motor, corrente, bateria, filtros,valor
    FROM servicos;
END //

DELIMITER //
CREATE PROCEDURE puMoto(
	IN	_id				INT,
    IN	_modelo			VARCHAR(100),
    IN _ano_modelo		year,
    IN _ano_fabricacao	year,
    IN _cor_primaria	varchar(100),
    IN _cor_secundaria	varchar(100),
    IN _valor			decimal(10,2)
)
BEGIN
	UPDATE moto
    	SET modelo = _modelo,
        	ano_modelo = _ano_modelo,
            ano_fabricacao = _ano_fabricacao,
             cor_primaria = _cor_primaria,
              cor_secundaria = _cor_secundaria,
               valor = _valor,
    WHERE id_moto = _id;
END //


DELIMITER //
CREATE PROCEDURE puMoto(
	IN _id_moto INT,
    IN _modelo VARCHAR(100),
    IN _ano_modelo YEAR,
    IN _ano_fabricacao YEAR,
    IN _cor_primaria VARCHAR(100),
    IN _cor_secundaria VARCHAR(100),
    IN _valor DECIMAL(10,2)
)
BEGIN
	UPDATE moto
		SET modelo = _modelo,
        	ano_modelo = _ano_modelo,
            ano_fabricacao = _ano_fabricacao,
            cor_primaria = _cor_primaria,
            cor_secundaria = _cor_secundaria,
            valor = _valor
    WHERE id_moto = _id_moto;
END //

DELIMITER //
CREATE PROCEDURE puServico(
    IN _id_servicos			int,
	IN _tipo_servico		VARCHAR(1000),
    IN _valor				decimal(10,2)
)
BEGIN
	UPDATE servicos
		SET tipo_servico = _tipo_servico,
            valor = _valor
    WHERE id_servicos = _id_servicos;
END //


DELIMITER //
CREATE PROCEDURE pdMoto(
	IN 	_id		INT
)
BEGIN
	DELETE FROM moto WHERE id_moto = _id;
END //


DELIMITER //
CREATE PROCEDURE pdServico(
	IN 	_id		INT
)
BEGIN
	DELETE FROM servicos WHERE id_servicos = _id;
END //