<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTriggerAuditoria extends Migration
{
    public function up()
    {
        $sqlRawCreateFunction = "CREATE OR REPLACE FUNCTION audit_trigger()
            RETURNS trigger AS $$
            DECLARE
                old_row json := NULL;
                new_row json := NULL;
            BEGIN
                IF TG_OP IN ('UPDATE','DELETE') THEN
                    old_row = row_to_json(OLD);
                END IF;
                IF TG_OP IN ('INSERT','UPDATE') THEN
                    new_row = row_to_json(NEW);
                END IF;
                INSERT INTO logs.auditorias(
                    created_at,
                    nome_tabela,
                    operacao,
                    registro_anterior,
                    registro_posterior
                ) VALUES (
                    current_timestamp AT TIME ZONE 'UTC',
                    TG_TABLE_SCHEMA || '.' || TG_TABLE_NAME,
                    TG_OP,
                    old_row,
                    new_row
                );
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ";
        $this->db->query(new RawSql($sqlRawCreateFunction));

        $sqlRawCreateTrigger = "CREATE TRIGGER t_auditoria_logs
            AFTER INSERT OR UPDATE OR DELETE
            ON atividades.atividades_complementares
            FOR EACH ROW
            EXECUTE PROCEDURE audit_trigger();
        ";
        $this->db->query(new RawSql($sqlRawCreateTrigger));
    }

    public function down()
    {

        $this->db->query(new RawSql("DROP TRIGGER t_auditoria_logs ON atividades.atividades_complementares;"));
        $this->db->query(new RawSql("DROP FUNCTION audit_trigger;"));
    }
}
