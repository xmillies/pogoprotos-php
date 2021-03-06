<?php
// Generated by https://github.com/jaspervdm/protoc-gen-php
namespace POGOProtos\Networking\Responses {

  use Protobuf;
  use ProtobufIO;
  use ProtobufEnum;
  use ProtobufMessage;

  // message POGOProtos.Networking.Responses.GetAssetDigestResponse
  final class GetAssetDigestResponse extends ProtobufMessage {

    private $_unknown;
    private $digest = array(); // repeated .POGOProtos.Data.AssetDigestEntry digest = 1
    private $timestampMs = 0; // optional uint64 timestamp_ms = 2

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
          case 1: // repeated .POGOProtos.Data.AssetDigestEntry digest = 1
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->digest[] = new \POGOProtos\Data\AssetDigestEntry($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\AssetDigestEntry did not read the full length');

            break;
          case 2: // optional uint64 timestamp_ms = 2
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_UINT64 || $tmp > Protobuf::MAX_UINT64) throw new \Exception('uint64 out of range');$this->timestampMs = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      foreach($this->digest as $v) {
        fwrite($fp, "\x0a", 1);
        Protobuf::write_varint($fp, $v->size());
        $v->write($fp);
      }
      if ($this->timestampMs !== 0) {
        fwrite($fp, "\x10", 1);
        Protobuf::write_varint($fp, $this->timestampMs);
      }
    }

    public function size() {
      $size = 0;
      foreach($this->digest as $v) {
        $l = $v->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->timestampMs !== 0) {
        $size += 1 + Protobuf::size_varint($this->timestampMs);
      }
      return $size;
    }

    public function clearDigest() { $this->digest = array(); }
    public function getDigestCount() { return count($this->digest); }
    public function getDigest($index) { return $this->digest[$index]; }
    public function getDigestArray() { return $this->digest; }
    public function setDigest($index, array $value) {$this->digest[$index] = $value; }
    public function addDigest(array $value) { $this->digest[] = $value; }
    public function addAllDigest(array $values) { foreach($values as $value) {$this->digest[] = $value; }}

    public function clearTimestampMs() { $this->timestampMs = 0; }
    public function getTimestampMs() { return $this->timestampMs;}
    public function setTimestampMs($value) { $this->timestampMs = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('digest', $this->digest, null)
           . Protobuf::toString('timestamp_ms', $this->timestampMs, 0);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Responses.GetAssetDigestResponse)
  }

}