<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class Datagrid {
    protected $em;
    private $dateFormat = 'Y-m-d H:i:s';

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Возвращает json для отправки на клиент
     * @param string $entityName - название сущности
     * @param array $columns - массив колонок
     * @return string - json для отравки клиенту
     */
    public function getDatagridData($entityName, $columns) {
        $repository = $this->em->getRepository('AppBundle:' . $entityName);

        $qb = $repository->createQueryBuilder('p');
        $columns = array_map(function($c) {return "p." . $c;}, $columns);
        $qb->select($columns);

        $query = $qb->getQuery();

        $data = $query->getArrayResult();

        return json_encode(['data' => $this->prepareData($data)]);
    }

    /**
     * Превращает скалярные значения в строки, а дату приводит к формату
     * @param array $data
     * @return array
     */
    private function prepareData($data) {
        return array_map(function($row) {
            return array_map(function($item) {
                return is_scalar($item) ? (string) $item : date($this->dateFormat);
            }, array_values($row));
        }, $data);
    }

    /**
     * Устанавливает формат даты
     * @param mixed $dateFormat
     */
    public function setDateFormat($dateFormat) {
        $this->dateFormat = $dateFormat;
    }


}
