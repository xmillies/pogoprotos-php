<?php
// Generated by https://github.com/jaspervdm/protoc-gen-php
namespace POGOProtos\Data\Logs {

  use Protobuf;
  use ProtobufIO;
  use ProtobufEnum;
  use ProtobufMessage;

  // enum POGOProtos.Data.Logs.CatchPokemonLogEntry.Result
  abstract class CatchPokemonLogEntry_Result extends ProtobufEnum {
    const UNSET = 0;
    const POKEMON_CAPTURED = 1;
    const POKEMON_FLED = 2;

    public static $_values = array(
      0 => "UNSET",
      1 => "POKEMON_CAPTURED",
      2 => "POKEMON_FLED",
    );

    public static function isValid($value) {
      return array_key_exists($value, self::$_values);
    }

    public static function toString($value) {
      checkArgument(is_int($value), 'value must be a integer');
      if (array_key_exists($value, self::$_values))
        return self::$_values[$value];
      return 'UNKNOWN';
    }
  }

  // message POGOProtos.Data.Logs.CatchPokemonLogEntry
  final class CatchPokemonLogEntry extends ProtobufMessage {

    private $_unknown;
    private $result = CatchPokemonLogEntry_Result::UNSET; // optional .POGOProtos.Data.Logs.CatchPokemonLogEntry.Result result = 1
    private $pokemonId = PokemonId::MISSINGNO; // optional .POGOProtos.Enums.PokemonId pokemon_id = 2
    private $combatPoints = 0; // optional int32 combat_points = 3
    private $pokemonDataId = 0; // optional uint64 pokemon_data_id = 4

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
      parent::__construct($in, $limit);
    }

    public function read($fp, &$limit = PHP_INT_MAX) {
      $fp = ProtobufIO::toStream($fp, $limit);
      while(!feof($fp) && $limit > 0) {
        $tag = Protobuf::read_varint($fp, $limit);
        if ($tag === false) break;
        $wire  = $tag & 0x07;
        $field = $tag >> 3;
        switch($field) {
          case 1: // optional .POGOProtos.Data.Logs.CatchPokemonLogEntry.Result result = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->result = $tmp;

            break;
          case 2: // optional .POGOProtos.Enums.PokemonId pokemon_id = 2
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->pokemonId = $tmp;

            break;
          case 3: // optional int32 combat_points = 3
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_signed_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_INT32 || $tmp > Protobuf::MAX_INT32) throw new \Exception('int32 out of range');$this->combatPoints = $tmp;

            break;
          case 4: // optional uint64 pokemon_data_id = 4
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_UINT64 || $tmp > Protobuf::MAX_UINT64) throw new \Exception('uint64 out of range');$this->pokemonDataId = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->result !== CatchPokemonLogEntry_Result::UNSET) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->result);
      }
      if ($this->pokemonId !== PokemonId::MISSINGNO) {
        fwrite($fp, "\x10", 1);
        Protobuf::write_varint($fp, $this->pokemonId);
      }
      if ($this->combatPoints !== 0) {
        fwrite($fp, "\x18", 1);
        Protobuf::write_varint($fp, $this->combatPoints);
      }
      if ($this->pokemonDataId !== 0) {
        fwrite($fp, " ", 1);
        Protobuf::write_varint($fp, $this->pokemonDataId);
      }
    }

    public function size() {
      $size = 0;
      if ($this->result !== CatchPokemonLogEntry_Result::UNSET) {
        $size += 1 + Protobuf::size_varint($this->result);
      }
      if ($this->pokemonId !== PokemonId::MISSINGNO) {
        $size += 1 + Protobuf::size_varint($this->pokemonId);
      }
      if ($this->combatPoints !== 0) {
        $size += 1 + Protobuf::size_varint($this->combatPoints);
      }
      if ($this->pokemonDataId !== 0) {
        $size += 1 + Protobuf::size_varint($this->pokemonDataId);
      }
      return $size;
    }

    public function clearResult() { $this->result = CatchPokemonLogEntry_Result::UNSET; }
    public function getResult() { return $this->result;}
    public function setResult($value) { $this->result = $value; }

    public function clearPokemonId() { $this->pokemonId = PokemonId::MISSINGNO; }
    public function getPokemonId() { return $this->pokemonId;}
    public function setPokemonId($value) { $this->pokemonId = $value; }

    public function clearCombatPoints() { $this->combatPoints = 0; }
    public function getCombatPoints() { return $this->combatPoints;}
    public function setCombatPoints($value) { $this->combatPoints = $value; }

    public function clearPokemonDataId() { $this->pokemonDataId = 0; }
    public function getPokemonDataId() { return $this->pokemonDataId;}
    public function setPokemonDataId($value) { $this->pokemonDataId = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('result', $this->result, CatchPokemonLogEntry_Result::UNSET)
           . Protobuf::toString('pokemon_id', $this->pokemonId, PokemonId::MISSINGNO)
           . Protobuf::toString('combat_points', $this->combatPoints, 0)
           . Protobuf::toString('pokemon_data_id', $this->pokemonDataId, 0);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Data.Logs.CatchPokemonLogEntry)
  }

}