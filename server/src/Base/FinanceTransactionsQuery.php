<?php

namespace Base;

use \FinanceTransactions as ChildFinanceTransactions;
use \FinanceTransactionsQuery as ChildFinanceTransactionsQuery;
use \Exception;
use \PDO;
use Map\FinanceTransactionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'finance_transactions' table.
 *
 *
 *
 * @method     ChildFinanceTransactionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFinanceTransactionsQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildFinanceTransactionsQuery orderByAccount($order = Criteria::ASC) Order by the account column
 * @method     ChildFinanceTransactionsQuery orderByEnteredBy($order = Criteria::ASC) Order by the entered_by column
 * @method     ChildFinanceTransactionsQuery orderByItem($order = Criteria::ASC) Order by the item column
 * @method     ChildFinanceTransactionsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildFinanceTransactionsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildFinanceTransactionsQuery orderBySrcDst($order = Criteria::ASC) Order by the src_dst column
 * @method     ChildFinanceTransactionsQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildFinanceTransactionsQuery orderByRequestDate($order = Criteria::ASC) Order by the request_date column
 * @method     ChildFinanceTransactionsQuery orderByCompleteDate($order = Criteria::ASC) Order by the complete_date column
 *
 * @method     ChildFinanceTransactionsQuery groupById() Group by the id column
 * @method     ChildFinanceTransactionsQuery groupByAmount() Group by the amount column
 * @method     ChildFinanceTransactionsQuery groupByAccount() Group by the account column
 * @method     ChildFinanceTransactionsQuery groupByEnteredBy() Group by the entered_by column
 * @method     ChildFinanceTransactionsQuery groupByItem() Group by the item column
 * @method     ChildFinanceTransactionsQuery groupByStatus() Group by the status column
 * @method     ChildFinanceTransactionsQuery groupByType() Group by the type column
 * @method     ChildFinanceTransactionsQuery groupBySrcDst() Group by the src_dst column
 * @method     ChildFinanceTransactionsQuery groupByNotes() Group by the notes column
 * @method     ChildFinanceTransactionsQuery groupByRequestDate() Group by the request_date column
 * @method     ChildFinanceTransactionsQuery groupByCompleteDate() Group by the complete_date column
 *
 * @method     ChildFinanceTransactionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFinanceTransactionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFinanceTransactionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFinanceTransactions findOne(ConnectionInterface $con = null) Return the first ChildFinanceTransactions matching the query
 * @method     ChildFinanceTransactions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFinanceTransactions matching the query, or a new ChildFinanceTransactions object populated from the query conditions when no match is found
 *
 * @method     ChildFinanceTransactions findOneById(int $id) Return the first ChildFinanceTransactions filtered by the id column
 * @method     ChildFinanceTransactions findOneByAmount(double $amount) Return the first ChildFinanceTransactions filtered by the amount column
 * @method     ChildFinanceTransactions findOneByAccount(int $account) Return the first ChildFinanceTransactions filtered by the account column
 * @method     ChildFinanceTransactions findOneByEnteredBy(string $entered_by) Return the first ChildFinanceTransactions filtered by the entered_by column
 * @method     ChildFinanceTransactions findOneByItem(int $item) Return the first ChildFinanceTransactions filtered by the item column
 * @method     ChildFinanceTransactions findOneByStatus(int $status) Return the first ChildFinanceTransactions filtered by the status column
 * @method     ChildFinanceTransactions findOneByType(int $type) Return the first ChildFinanceTransactions filtered by the type column
 * @method     ChildFinanceTransactions findOneBySrcDst(string $src_dst) Return the first ChildFinanceTransactions filtered by the src_dst column
 * @method     ChildFinanceTransactions findOneByNotes(string $notes) Return the first ChildFinanceTransactions filtered by the notes column
 * @method     ChildFinanceTransactions findOneByRequestDate(int $request_date) Return the first ChildFinanceTransactions filtered by the request_date column
 * @method     ChildFinanceTransactions findOneByCompleteDate(int $complete_date) Return the first ChildFinanceTransactions filtered by the complete_date column *

 * @method     ChildFinanceTransactions requirePk($key, ConnectionInterface $con = null) Return the ChildFinanceTransactions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOne(ConnectionInterface $con = null) Return the first ChildFinanceTransactions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFinanceTransactions requireOneById(int $id) Return the first ChildFinanceTransactions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByAmount(double $amount) Return the first ChildFinanceTransactions filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByAccount(int $account) Return the first ChildFinanceTransactions filtered by the account column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByEnteredBy(string $entered_by) Return the first ChildFinanceTransactions filtered by the entered_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByItem(int $item) Return the first ChildFinanceTransactions filtered by the item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByStatus(int $status) Return the first ChildFinanceTransactions filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByType(int $type) Return the first ChildFinanceTransactions filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneBySrcDst(string $src_dst) Return the first ChildFinanceTransactions filtered by the src_dst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByNotes(string $notes) Return the first ChildFinanceTransactions filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByRequestDate(int $request_date) Return the first ChildFinanceTransactions filtered by the request_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFinanceTransactions requireOneByCompleteDate(int $complete_date) Return the first ChildFinanceTransactions filtered by the complete_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFinanceTransactions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFinanceTransactions objects based on current ModelCriteria
 * @method     ChildFinanceTransactions[]|ObjectCollection findById(int $id) Return ChildFinanceTransactions objects filtered by the id column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByAmount(double $amount) Return ChildFinanceTransactions objects filtered by the amount column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByAccount(int $account) Return ChildFinanceTransactions objects filtered by the account column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByEnteredBy(string $entered_by) Return ChildFinanceTransactions objects filtered by the entered_by column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByItem(int $item) Return ChildFinanceTransactions objects filtered by the item column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByStatus(int $status) Return ChildFinanceTransactions objects filtered by the status column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByType(int $type) Return ChildFinanceTransactions objects filtered by the type column
 * @method     ChildFinanceTransactions[]|ObjectCollection findBySrcDst(string $src_dst) Return ChildFinanceTransactions objects filtered by the src_dst column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByNotes(string $notes) Return ChildFinanceTransactions objects filtered by the notes column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByRequestDate(int $request_date) Return ChildFinanceTransactions objects filtered by the request_date column
 * @method     ChildFinanceTransactions[]|ObjectCollection findByCompleteDate(int $complete_date) Return ChildFinanceTransactions objects filtered by the complete_date column
 * @method     ChildFinanceTransactions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FinanceTransactionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FinanceTransactionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\FinanceTransactions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFinanceTransactionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFinanceTransactionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFinanceTransactionsQuery) {
            return $criteria;
        }
        $query = new ChildFinanceTransactionsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildFinanceTransactions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FinanceTransactionsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FinanceTransactionsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFinanceTransactions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `amount`, `account`, `entered_by`, `item`, `status`, `type`, `src_dst`, `notes`, `request_date`, `complete_date` FROM `finance_transactions` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildFinanceTransactions $obj */
            $obj = new ChildFinanceTransactions();
            $obj->hydrate($row);
            FinanceTransactionsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildFinanceTransactions|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the account column
     *
     * Example usage:
     * <code>
     * $query->filterByAccount(1234); // WHERE account = 1234
     * $query->filterByAccount(array(12, 34)); // WHERE account IN (12, 34)
     * $query->filterByAccount(array('min' => 12)); // WHERE account > 12
     * </code>
     *
     * @param     mixed $account The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByAccount($account = null, $comparison = null)
    {
        if (is_array($account)) {
            $useMinMax = false;
            if (isset($account['min'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_ACCOUNT, $account['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($account['max'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_ACCOUNT, $account['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_ACCOUNT, $account, $comparison);
    }

    /**
     * Filter the query on the entered_by column
     *
     * Example usage:
     * <code>
     * $query->filterByEnteredBy('fooValue');   // WHERE entered_by = 'fooValue'
     * $query->filterByEnteredBy('%fooValue%'); // WHERE entered_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $enteredBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByEnteredBy($enteredBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($enteredBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $enteredBy)) {
                $enteredBy = str_replace('*', '%', $enteredBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_ENTERED_BY, $enteredBy, $comparison);
    }

    /**
     * Filter the query on the item column
     *
     * Example usage:
     * <code>
     * $query->filterByItem(1234); // WHERE item = 1234
     * $query->filterByItem(array(12, 34)); // WHERE item IN (12, 34)
     * $query->filterByItem(array('min' => 12)); // WHERE item > 12
     * </code>
     *
     * @param     mixed $item The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByItem($item = null, $comparison = null)
    {
        if (is_array($item)) {
            $useMinMax = false;
            if (isset($item['min'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_ITEM, $item['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($item['max'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_ITEM, $item['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_ITEM, $item, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type > 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the src_dst column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcDst('fooValue');   // WHERE src_dst = 'fooValue'
     * $query->filterBySrcDst('%fooValue%'); // WHERE src_dst LIKE '%fooValue%'
     * </code>
     *
     * @param     string $srcDst The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterBySrcDst($srcDst = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($srcDst)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $srcDst)) {
                $srcDst = str_replace('*', '%', $srcDst);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_SRC_DST, $srcDst, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notes)) {
                $notes = str_replace('*', '%', $notes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the request_date column
     *
     * Example usage:
     * <code>
     * $query->filterByRequestDate(1234); // WHERE request_date = 1234
     * $query->filterByRequestDate(array(12, 34)); // WHERE request_date IN (12, 34)
     * $query->filterByRequestDate(array('min' => 12)); // WHERE request_date > 12
     * </code>
     *
     * @param     mixed $requestDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByRequestDate($requestDate = null, $comparison = null)
    {
        if (is_array($requestDate)) {
            $useMinMax = false;
            if (isset($requestDate['min'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_REQUEST_DATE, $requestDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requestDate['max'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_REQUEST_DATE, $requestDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_REQUEST_DATE, $requestDate, $comparison);
    }

    /**
     * Filter the query on the complete_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCompleteDate(1234); // WHERE complete_date = 1234
     * $query->filterByCompleteDate(array(12, 34)); // WHERE complete_date IN (12, 34)
     * $query->filterByCompleteDate(array('min' => 12)); // WHERE complete_date > 12
     * </code>
     *
     * @param     mixed $completeDate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function filterByCompleteDate($completeDate = null, $comparison = null)
    {
        if (is_array($completeDate)) {
            $useMinMax = false;
            if (isset($completeDate['min'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_COMPLETE_DATE, $completeDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($completeDate['max'])) {
                $this->addUsingAlias(FinanceTransactionsTableMap::COL_COMPLETE_DATE, $completeDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FinanceTransactionsTableMap::COL_COMPLETE_DATE, $completeDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFinanceTransactions $financeTransactions Object to remove from the list of results
     *
     * @return $this|ChildFinanceTransactionsQuery The current query, for fluid interface
     */
    public function prune($financeTransactions = null)
    {
        if ($financeTransactions) {
            $this->addUsingAlias(FinanceTransactionsTableMap::COL_ID, $financeTransactions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the finance_transactions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FinanceTransactionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FinanceTransactionsTableMap::clearInstancePool();
            FinanceTransactionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FinanceTransactionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FinanceTransactionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FinanceTransactionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FinanceTransactionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FinanceTransactionsQuery
